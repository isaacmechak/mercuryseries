import axios from 'https://cdn.jsdelivr.net/npm/axios@1.3.5/+esm';

document.addEventListener('DOMContentLoaded',  function () {
    document.getElementById('formEnter').addEventListener('submit', async function (event) {
        event.preventDefault();
        console.log(document.getElementById('formEnter'))

      const form = event.target;
      const formData = new FormData(form);

      /*fetch('sendCash', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': document.querySelector('[name="_token"]').getAttribute('content')
        },
        body: formData,
      })
      .then(response => response.json())
      .then(data => {
        // Traitement des données de la réponse ici
        console.log(data);
      })
      .catch(error => {
        // Gestion des erreurs ici
        console.error(error);
      });
      */
      await axios.post('/transferMoney', formData, {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('[name="_token"]').getAttribute('content')
        },
      })
      .then(function (response) {
        console.log(response);
        if (response.success) {
            alert(response.message)
        }
      })
      .catch(function (error) {
        console.log(error);
      });
    });
  });
