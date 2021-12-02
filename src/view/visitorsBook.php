<?php $this->layout('template', ['title' => 'Vieraskirja']) ?>

<h1><?= $cottage['name'] ?> mökin vieraskirja merkinnät</h1>
<?php
if ($loggeduser) {
    echo "<div class='book'>";
    echo "<form action='' method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='message'>Lähetä viesti</label>";
    echo "<textarea class='form-control' rows='5' placeholder='Lähetä enintään 200 merkkiä pitkä viesti vieraskirjaan, älä käytä erikoismerkkejä.' name='message' id='message' required></textarea>";
    echo "<input type='submit' name='send' value='Lähetä' />";
    echo "</div>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<div class=info> Sinun tulee olla kirjautuneen palveluun <br>
    tehdäksesi vieraskirjaan merkintöjä<br>
    Kirjaudu sisään <a href='login'>tästä</a>!</div>";
}
require_once MODEL_DIR . 'person.php';
echo "<div>";
foreach ($messages as $message) {
    $person = getPersonByIdperson($message['idperson']);
    echo "<hr>";
    echo "<h2>$person[name]</h2>";
    echo "<div>$message[time]</div>";
    echo "<div>$message[message]</div>";
}
echo "</div>";
?>
