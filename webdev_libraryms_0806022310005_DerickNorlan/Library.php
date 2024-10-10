<?php
include 'Book.php';
include 'Ebook.php';
include 'PrintedBook.php';

session_start();
if (isset($_GET['jumlah'])) {
    $_SESSION['jumlah'] = $_GET['jumlah'];
    $_SESSION['hitung'] = 1;
    $_SESSION['datas'] = [];
    echo "
        <script>
            window.location.href = window.location.href.split('?')[0]+'?page=input';
        </script>
    ";
}

if (isset($_POST['create']) && $_SESSION['hitung'] <= $_SESSION['jumlah']) {
    if (isset($_SESSION['datas'])) {
        if (is_array($_SESSION['datas'])) {
            if ($_POST['tipe_buku'] == "E-Book") array_push($_SESSION['datas'], new EBook($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['bookSize']));
            else if ($_POST['tipe_buku'] == "Printed Book") array_push($_SESSION['datas'], new PrintedBook($_POST['title'], $_POST['author'], $_POST['publicationYear'], $_POST['bookSize']));
            $_SESSION['hitung']++;
        }
    } else {
        $_SESSION['datas'] = [];
    }
}
if(!(isset($_SESSION['hitung']) && $_SESSION['jumlah']) && $_GET['page'] != "index") header("Location:Library.php?page=index");

function index()
{
    echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Buku</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="container">
        <h1>Form Buku</h1>
        <button onclick="input()">Input</button>
        <a href="Library.php?page=cetak"><button>Cetak</button></a>
    </div>

    <script>
        function input(){
            let jumlah = window.prompt("Mau berapa buku?", 1);
            if(!(jumlah >= 1 && jumlah <= 100)){
                alert("jumlah harus lebih dari 1 dan tidak lebih dari 100");
            } else {
                window.location.href = "Library.php?page=input&jumlah="+jumlah;
            }
        }
    </script>
</body>
</html>';
}

function cetak()
{
    if (isset($_SESSION['hitung']) && isset($_SESSION['jumlah'])) {
        if ($_SESSION['hitung'] <= $_SESSION['jumlah']) {
            header("Location:Library.php?page=input");
        }
    }
    if (count($_SESSION['datas']) == $_SESSION['jumlah']) {
        foreach($_SESSION['datas'] as $data){
            echo $data->getDetails();
            echo "<br>";
            echo "<br>";
        }
    }
}

function input()
{
    if (isset($_SESSION['hitung']) && isset($_SESSION['jumlah'])) {
        if ($_SESSION['hitung'] > $_SESSION['jumlah']) {
            header("Location:Library.php?page=index");
        }
    }
    echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Buku</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <div class="form-container">
        <h1>Input Buku ' . $_SESSION['hitung'] . '/' . $_SESSION['jumlah'] . '</h1>
        <form action="" method="post" id="formBuku">
            <label for="tipe_buku">Tipe Buku:</label>
            <select name="tipe_buku" id="tipe_buku">
                <option selected disabled></option>
                <option>E-Book</option>
                <option>Printed Book</option>
            </select>

            <label for="title">Title:</label>
            <input type="text" name="title" id="title">

            <label for="author">Author:</label>
            <input type="text" name="author" id="author">

            <label for="publicationYear">Publication Year:</label>
            <input type="number" name="publicationYear" id="publicationYear" min="1500" max="2024">

            <label id="ubah">File Size/Number of Pages:</label>
            <input type="number" name="bookSize" id="bookSize">

            <input type="submit" name="create" value="Kirim">
        </form>
    </div>

    <script>
        const form = document.getElementById("formBuku");
        const bookSize = document.getElementById("bookSize");
        const bookSizeText = document.getElementById("ubah");
        const tipeBuku = document.getElementById("tipe_buku");

        bookSize.style.display = "none";
        bookSizeText.style.display = "none";

        tipeBuku.addEventListener("change", function() {
            if (tipeBuku.value !== "") {
                bookSize.style.display = "block";
                bookSizeText.style.display = "block";
                if(tipeBuku.value === "E-Book"){
                    bookSizeText.innerHTML = "File Size (MB): ";
                    bookSize.setAttribute("min", 1);
                    bookSize.setAttribute("max", 100);
                }
                else if(tipeBuku.value === "Printed Book"){
                    bookSizeText.innerHTML = "Number of Pages: ";
                    bookSize.removeAttribute("min");
                    bookSize.removeAttribute("max");
                }
            } else {
                bookSize.style.display = "none";
                bookSizeText.style.display = "none";
            }
        });

        form.addEventListener("submit", function(e) {
            var errorText = "";
            if (!["E-Book", "Printed Book"].includes(tipeBuku.value)) {
                errorText += "Tipe Buku Salah!";
            }
            if (document.getElementById("title").value === "" || document.getElementById("title").value.length > 100) {
                if (errorText != "") errorText += "\n";
                errorText += "Title Invalid!";
            }
            if (document.getElementById("author").value === "" || document.getElementById("author").value.length > 100) {
                if (errorText != "") errorText += "\n";
                errorText += "Author Invalid!";
            }
            if (document.getElementById("publicationYear").value === "" || document.getElementById("publicationYear").value < 1500 || document.getElementById("publicationYear").value > 2024) {
                if (errorText != "") errorText += "\n";
                errorText += "Publication Year Invalid!";
            }
            if (tipeBuku.value === "E-Book" && (document.getElementById("bookSize").value < 1 || document.getElementById("bookSize").value > 100)) {
                if (errorText != "") errorText += "\n";
                errorText += "Book Size Invalid!";
            }
            if (errorText != "") {
                e.preventDefault();
                alert(errorText);
            }
        });
    </script>
</body>

</html>';
}

if(isset($_GET['page'])){
    switch($_GET['page']){
        case "index":
            index();
            break;
        case "input":
            input();
            break;
        case "cetak":
            cetak();
            break;
        default:
            index();
    }
} else{
    index();
}
?>
