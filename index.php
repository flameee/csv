<?php
if ($_POST && empty($_GET['delete'])) {
    $cognome = $_POST['cognome'];
    $nome = $_POST['nome'];
    $nascita = $_POST['nascita'];
    $comune_nascita = $_POST['comune_nascita'];
    $sesso = $_POST['sesso'];
    $cf = $_POST['cf'];
    $cmp = $_POST['cmp'];
    $cfscuola = $_POST['cfscuola'];
    $nome_scuola = $_POST['nome_scuola'];
    $desc_scuola = $_POST['desc_scuola'];
    $classe = $_POST['classe'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $ind_domicilio = $_POST['ind_domicilio'];
    $comune_domicilio = $_POST['comune_domicilio'];
    $data_contatto = $_POST['data_contatto'];
    $ruolo = $_POST['ruolo'];

    $i = array("$cognome;$nome;$nascita;$comune_nascita;$sesso;$cf;$cmp;$cfscuola;$nome_scuola;$desc_scuola;$classe;$telefono;$email;$ind_domicilio;$comune_domicilio;$data_contatto;$ruolo");
    $fh = fopen('lista.csv', 'a');
    fputcsv($fh, $i);
    fclose($fh);
} else {

    if (!empty($_GET['delete'])) {
        $del = $_GET['delete'] - 1;
        $file = file('lista.csv');
        unset($file[$del]);
        file_put_contents('lista.csv', implode("", $file));
    }

    if (!empty($_GET['clear'])) {
        $file = fopen('lista.csv', "r+");
        ftruncate($file, 0);
        fclose($file);
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>COVID FORM</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>CSV Form</h1>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                            type="button" role="tab" aria-controls="home" aria-selected="true">Inserimento
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">CSV
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                            type="button" role="tab" aria-controls="contact" aria-selected="false">Lista
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <!-- FORM -->
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="" class="form-label">COGNOME</label>
                            <input type="text" class="form-control" id="cognome" name="cognome">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">NOME</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">DATA DI NASCITA (GG/MM/AAAA)</label>
                            <input type="text" class="form-control" id="nascita" name="nascita">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">COMUNE DI NASCITA</label>
                            <input type="text" class="form-control" id="comune_nascita" name="comune_nascita">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">SESSO</label>
                            <select class="form-select" name="sesso">
                                <option selected>SESSO</option>
                                <option value="M">Maschio</option>
                                <option value="F">Femmina</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">CODICE FISCALE</label>
                            <input type="text" class="form-control" id="cf" name="cf">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">CODICE MECCANOGRAFICO PLESSO</label>
                            <input type="text" class="form-control" id="cmp" name="cmp">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">CODICE FISCALE SCUOLA</label>
                            <input type="text" class="form-control" id="cfscuola" name="cfscuola">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">NOME SCUOLA</label>
                            <input type="text" class="form-control" id="nome_scuola" name="nome_scuola">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">DESCRIZIONE SCUOLA</label>
                            <input type="text" class="form-control" id="desc_scuola" name="desc_scuola">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">CLASSE</label>
                            <input type="text" class="form-control" id="classe" name="classe">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">TELEFONO</label>
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">EMAIL</label>
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">INDIRIZZO DI DOMICILIO</label>
                            <input type="text" class="form-control" id="ind_domicilio" name="ind_domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">COMUNE DI DOMICILIO</label>
                            <input type="text" class="form-control" id="comune_domicilio" name="comune_domicilio">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">DATA COMUNICAZIONE AL CONTATTO</label>
                            <input type="text" class="form-control" id="data_contatto" name="data_contatto">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">RUOLO</label>
                            <select class="form-select" name="ruolo">
                                <option>RUOLO</option>
                                <option value="PRIMARIA">PRIMARIA</option>
                                <option value="SECONDARIA1">SECONDARIA1</option>
                                <option value="SECONDARIA2">SECONDARIA2</option>
                                <option value="UNIVERSITA">UNIVERSITA</option>
                                <option selected value="INFANZIA">INFANZIA</option>
                                <option value="NIDO">NIDO</option>
                                <option value="DOCENTI">DOCENTI</option>
                                <option value="NONDOCENTI">NONDOCENTI</option>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="aggiungi">
                    </form>
                </div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <!-- CSV -->
                    <a href="lista.csv" download="" class="btn btn-success">Scarica</a>
                    <a href="index.php?clear=true" class="btn btn-danger">Svuota</a>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <!-- ELENCO -->
                    <?php
                    $row = 1;
                    if (($handle = fopen("lista.csv", "r")) !== FALSE) {
                        while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                            $num = count($data);
                            echo "<form action='index.php' method='get'><input type='hidden'  value='$row' name='delete'>";
                            //echo "<p> $num fields in line $row: <br /></p>\n";
                            $row++;
                            for ($c = 0; $c < $num; $c++) {
                                if ($data[$c]) {
                                    echo $data[$c] . "<br />\n";
                                }
                            }
                            echo "
                             
                            <input type='submit' class='btn btn-danger' value='elimina'> 
                            </form>
                            <hr>";
                        }
                        fclose($handle);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>
</html>
