<?php include 'header.php'; ?>

<div class="flex-container">
    <?php include 'sidenav.php'; ?>

    <section class="cities">
        <div class="main-container">
            <table border="2">
                <tr>
                    <th width="100">Ville</th>
                    <th width="120">Superficie</th>
                    <th width="160">Population</th>
                    <th width="400">Gallerie</th>
                </tr>
                <tr>
                    <td>Akureyri</td>
                    <td>138 km²</td>
                    <td>18 191 inhabitants</td>
                    <td>
                        <img class="img" data-number="1" src="./cities/Akureyri/nature 2.jpg" alt="Akureyri Nature">
                        <img class="img" data-number="3" src="./cities/Akureyri/whiteness.jpg" alt="Akureyri Whiteness">
                        <img class="img" data-number="4" src="./cities/Akureyri/Église de Akureyri.jpg" alt="Akureyri Church">
                    </td>
                </tr>
                <!-- Add more cities here -->
            </table>
        </div>
    </section>

    <div class="video-container">
        <iframe width="300" height="300" src="./videos/ICELAND｜Cinematic Video.mp4" frameborder="0" allowfullscreen></iframe>
    </div>
</div>

<?php include 'footer.php'; ?>