const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.box');

// Hidden tombol cari
tombolCari.style.display = 'none';


keyword.addEventListener('keyup', () => {
    // Ajax :
    // 1. xmlhttprequest
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         // console.log(xhr.responseText);
    //         container.innerHTML = xhr.responseText;
    //     }
    // };

    // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
    // xhr.send();

    // 2. Fetch
    fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
        .then((response) => response.text())
        .then((response) => (container.innerHTML = response))

})