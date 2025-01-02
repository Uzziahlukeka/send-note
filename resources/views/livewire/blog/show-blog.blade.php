<?php

use App\Models\Blog;
use Livewire\Volt\Component;

new class extends Component {
    //


};


?>

<div class="bg-gray-50 max-w-5xl mt-4">
    <x-card>
        <div class="container mx-auto p-8 bg-white shadow-lg rounded-lg">
            <!-- Image Slot -->
            <div class="w-full h-64 bg-gray-200 rounded-lg overflow-hidden mb-6">
                <img src="your-image-url-here.jpg" alt="Recap 2024 Banner" class="w-full h-full object-cover">
            </div>

            <h1 class="text-5xl font-extrabold text-gray-800">Recap 2024</h1>
            <p class="mt-4 text-sm text-gray-500">
                Posted le 28 décembre 2024 -
                <a href="#" class="text-blue-600 hover:underline">À Propos</a> -
                Par <span class="font-semibold">Grafikart</span> -
                <a href="#" class="text-blue-600 hover:underline">Proposer une correction</a>
            </p>
            <div class="mt-6">
                <p class="text-lg text-gray-700 leading-relaxed">
                    Salut tout le monde, j'espère que vous avez passé de bonnes fêtes et bonne année pour ceux qui
                    liront ces lignes en Janvier.
                    Comme chaque année, je vous propose de faire un petit récap des vidéos qui ont été publiées cette
                    année et de vous en parler avec un peu plus de recul.
                </p>
                <p class="mt-4 text-lg text-gray-700 leading-relaxed">
                    Pour parler chiffres, cette année c'est
                    <span class="font-semibold text-gray-800">82 vidéos</span>, soit
                    <span class="font-semibold text-gray-800">32 heures de vidéos</span> et, selon YouTube,
                    <span class="font-semibold text-gray-800">320 000 heures regardées</span> ! Mais quels ont été les
                    sujets abordés ?
                </p>
            </div>

            <section class="mt-12">
                <h2 class="text-3xl font-bold text-gray-800">Un point sur la sécurité</h2>
                <ul class="mt-6 space-y-4 text-lg text-gray-700">
                    <li>
                        <span class="font-semibold text-gray-800">Mars :</span> La mise en place et l'utilisation de
                        clés SSH ont été mises en avant comme fondamentales pour les développeurs travaillant avec des
                        services d'hébergement.
                    </li>
                    <li>
                        <span class="font-semibold text-gray-800">Avril :</span> Une série de vidéos sur la sécurité a
                        abordé les vulnérabilités courantes et les meilleures pratiques pour protéger les applications
                        web.
                    </li>
                    <li>
                        Création d'un captcha personnalisé avec JavaScript et PHP pour lutter contre le spam, explorant
                        une approche plus personnalisée comparée aux solutions comme reCAPTCHA et hCaptcha.
                    </li>
                </ul>
            </section>

            <section class="mt-12">
                <h2 class="text-3xl font-bold text-gray-800">Un peu d'IA</h2>
                <ul class="mt-6 space-y-4 text-lg text-gray-700">
                    <li>
                        Initialement évité de discuter de l'intelligence artificielle pour ne pas surcharger le sujet,
                        mais une vidéo résumant les points de vue sur l'IA a été créée.
                    </li>
                    <li>
                        Reste sceptique sur l'intégration de l'IA dans leur workflow, notant que si l'IA excelle dans la
                        génération de code générique, elle a du mal avec des problèmes plus complexes.
                    </li>
                    <li>
                        L'année 2024 a marqué l'évolution de l'intégration de l'IA dans les éditeurs avec la sortie de
                        Cursor, offrant des complétions de code capables de modifier du code existant.
                    </li>
                    <li>
                        Malgré les défis liés à l'utilisation des données, l'auteur n'exclut pas le potentiel d'une
                        réelle intégration de l'IA dans des projets professionnels.
                    </li>
                </ul>
            </section>

            <div class="mt-12">
                <iframe
                    width="100%"
                    height="400"
                    class="rounded-lg shadow-md"
                    src="https://www.youtube.com/embed/VIDEO_ID"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </x-card>

</div>


