// Kode untuk konversi mata uang
const exchangeRates = {
    USD: { USD: 1, EUR: 0.85, JPY: 110, IDR: 14300 },
    EUR: { USD: 1.18, EUR: 1, JPY: 130, IDR: 16800 },
    JPY: { USD: 0.0091, EUR: 0.0077, JPY: 1, IDR: 129.80 },
    IDR: { USD: 0.000070, EUR: 0.000059, JPY: 0.0077, IDR: 1 },
};

function convertCurrency() {
    const amount = parseFloat(document.getElementById("amount").value);
    const fromCurrency = document.getElementById("fromCurrency").value;
    const toCurrency = document.getElementById("toCurrency").value;

    // Validasi input
    if (isNaN(amount) || amount <= 0) {
        alert("Mohon masukkan jumlah yang valid!");
        return;
    }

    const rate = exchangeRates[fromCurrency][toCurrency];
    const convertedAmount = amount * rate;

    // Tampilkan hasil
    document.getElementById("result").innerHTML = `
        <h3>Hasil Konversi:</h3>
        <p>${amount} ${fromCurrency} = ${convertedAmount.toFixed(2)} ${toCurrency}</p>
    `;
}
