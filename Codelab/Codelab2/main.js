function hitung() {
    const bilangan1 = parseFloat(document.getElementById('bilangan1').value);
    const bilangan2 = parseFloat(document.getElementById('bilangan2').value);
    const hasil = bilangan1 + bilangan2;
    document.getElementById('hasil').textContent = hasil;
}

function reset() {
    document.getElementById('bilangan1').value = '';
    document.getElementById('bilangan2').value = '';
    document.getElementById('hasil').textContent = '';
}