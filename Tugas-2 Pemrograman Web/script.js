function calculatePrice() {
    const method = document.getElementById('method').value;
    const item = document.getElementById('item').value;
    const weight = parseFloat(document.getElementById('weight').value);
    let price = 0;
  
    if (method === 'standard') {
      if (item === 'pakaian') {
        price = weight * 3000;
      } else if (item === 'selimut') {
        price = weight * 10000;
      }
    } else if (method === 'express') {
      if (item === 'pakaian') {
        price = weight * 7000;
        if (weight < 3) {
          alert("Express service for Pakaian requires a minimum of 3 Kg.");
          return;
        }
      } else if (item === 'selimut') {
        price = weight * 12000;
      }
    }
  
    document.getElementById('price').value = `Rp ${price.toLocaleString()}`;
  }
  