<div id="chatbox"></div>

<input id="msg" type="text" placeholder="Scrivi un messaggio...">
<button onclick="sendMsg()">Invia</button>

<script>
function sendMsg() {
    let text = document.getElementById("msg").value;

    fetch("chat.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "msg=" + encodeURIComponent(text)
    })
    .then(r => r.json())
    .then(d => {
        document.getElementById("chatbox").innerHTML += "<p><b>Tu:</b> " + text + "</p>";
        document.getElementById("chatbox").innerHTML += "<p><b>Bot:</b> " + d.reply + "</p>";
    });
}
</script>
