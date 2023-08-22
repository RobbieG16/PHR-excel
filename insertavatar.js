function saveavatartoDB() {
    const images = document.querySelectorAll('img');
    const colorElements = document.querySelectorAll('[data-color]');

    const dataToSend = [];
    images.forEach((image, index) => {
        const value = image.getAttribute('value');
        const color = colorElements[index].getAttribute('value'); // Use 'value' attribute for color
        dataToSend.push({ value, color });
    });

    $.ajax({
        type: 'POST',
        url: 'update_database.php',
        data: {
            imageData: dataToSend
        },
        success: function(response) {

            console.log('Data uploaded and database updated successfully.');
        },
        error: function(error) {

            console.error('An error occurred: ', error);
        }
    });
}
