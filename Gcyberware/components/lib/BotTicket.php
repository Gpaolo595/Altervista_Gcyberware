<?php

class BotTicket {
    
    /**
     * Genera un ID univoco per il ticket
     * Formato: TICKET-YYYYMMDD-NUMERO
     */
    private static function generateId() {
        $date = date('Ymd');
        $randomNum = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);
        return "TICKET-{$date}-{$randomNum}";
    }

    /**
     * Crea un nuovo ticket bot
     * 
     * @param string $description Descrizione del problema
     * @param array $files Array di file coinvolti
     * @param string $cause Root cause ipotizzata
     * @param array $resolution Array di azioni per risolvere
     * @param string $urgency 🔴 Critica | 🟠 Alta | 🟡 Media | 🟢 Bassa
     * @return array Ticket creato con ID
     */
    public static function create(
        $description, 
        $files = [], 
        $cause = "", 
        $resolution = [], 
        $urgency = "🟡 Media"
    ) {
        $id = self::generateId();
        $timestamp = date('Y-m-d H:i:s');
        $basePath = __DIR__ . "/../../tickets";
        
        // Creare cartella se non esiste
        if (!is_dir($basePath)) {
            mkdir($basePath, 0777, true);
        }

        // Costruire contenuto ticket in Markdown
        $content = self::buildTicketContent(
            $id,
            $description,
            $files,
            $cause,
            $resolution,
            $urgency,
            $timestamp
        );

        // Salvare il ticket
        $filename = "{$basePath}/{$id}.md";
        file_put_contents($filename, $content);

        // Anche formato JSON per parsing automatico
        $jsonData = [
            'id' => $id,
            'created_at' => $timestamp,
            'urgency' => $urgency,
            'description' => $description,
            'files' => $files,
            'root_cause' => $cause,
            'resolution_steps' => $resolution,
            'status' => 'OPEN',
            'created_by' => 'BOT'
        ];
        
        $jsonFilename = "{$basePath}/{$id}.json";
        file_put_contents($jsonFilename, json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return [
            'id' => $id,
            'filename' => $filename,
            'json_filename' => $jsonFilename,
            'created_at' => $timestamp
        ];
    }

    /**
     * Costruisce il contenuto del ticket in Markdown
     */
    private static function buildTicketContent(
        $id,
        $description,
        $files,
        $cause,
        $resolution,
        $urgency,
        $timestamp
    ) {
        $filesStr = !empty($files) ? implode("\n  - ", $files) : "N/A";
        $resolutionStr = !empty($resolution) ? implode("\n  - ", $resolution) : "N/A";

        return <<<TICKET
# [TICKET]

**ID:** $id  
**Utente:** Princhi  
**Urgenza:** $urgency  
**Status:** OPEN  
**Data Creazione:** $timestamp  
**Creato da:** BOT  

---

## 📋 Descrizione Problema

$description

---

## 📁 File Coinvolti

- $filesStr

---

## 🔍 Root Cause Ipotizzata

$cause

---

## ✅ Cosa Serve per Risolvere

- $resolutionStr

---

## 📝 Note

Questo ticket è stato generato automaticamente dal bot quando ha incontrato un problema non risolvibile.

**Consultare BOT_INSTRUCTIONS.md per il sistema completo di ticket.**

TICKET;
    }

    /**
     * Legge i ticket aperti
     */
    public static function getOpen() {
        $basePath = __DIR__ . "/../../tickets";
        if (!is_dir($basePath)) {
            return [];
        }

        $tickets = [];
        $files = glob("{$basePath}/*.json");
        
        foreach ($files as $file) {
            $data = json_decode(file_get_contents($file), true);
            if ($data && $data['status'] === 'OPEN') {
                $tickets[] = $data;
            }
        }

        return array_reverse($tickets); // Più recenti per primi
    }

    /**
     * Chiude un ticket
     */
    public static function close($ticketId, $resolution = "") {
        $basePath = __DIR__ . "/../../tickets";
        $jsonFile = "{$basePath}/{$ticketId}.json";
        $mdFile = "{$basePath}/{$ticketId}.md";

        if (!file_exists($jsonFile)) {
            return false;
        }

        // Aggiornare JSON
        $data = json_decode(file_get_contents($jsonFile), true);
        $data['status'] = 'CLOSED';
        $data['closed_at'] = date('Y-m-d H:i:s');
        if (!empty($resolution)) {
            $data['resolution'] = $resolution;
        }
        file_put_contents($jsonFile, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        // Aggiornare Markdown
        $content = file_get_contents($mdFile);
        $content = str_replace('**Status:** OPEN', '**Status:** CLOSED', $content);
        $content .= "\n\n---\n\n## ✔️ Risoluzione\n\n" . ($resolution ?: "Ticket chiuso automaticamente");
        file_put_contents($mdFile, $content);

        return true;
    }
}
