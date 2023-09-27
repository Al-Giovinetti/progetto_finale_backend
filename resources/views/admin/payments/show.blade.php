
<h1>
    Il pagamento è avvenuto con successo
</h1>

<script>
        // Imposta il ritardo in millisecondi (ad esempio, 5000ms per 5 secondi)
        var ritardoInMillisecondi = 5000;

        // Funzione per reindirizzare l'utente dopo il ritardo
        function reindirizza() {
            window.location.href = "{{ route('admin.musicians.show', ['musician' => $currentMusician]) }}";
        }

        // Avvia il ritardo e il reindirizzamento
        setTimeout(reindirizza, ritardoInMillisecondi);
    </script>