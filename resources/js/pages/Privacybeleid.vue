<script setup lang="ts">
import FrontLayout from '@/layouts/FrontLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <FrontLayout>
        <Head title="Producten - Haircare shop">
            <link rel="preconnect" href="https://rsms.me/" />
            <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
        </Head>

        <div class="min-h-screen bg-white text-gray-800">
            <!-- Privacybeleid -->
            <section class="container mx-auto px-4 py-16">
                <h2 class="relative mb-4 pb-2 text-3xl font-bold">
                    Privacybeleid
                    <span class="absolute bottom-0 left-0 h-1 w-24 bg-purple-700"></span>
                </h2>
                <p class="mb-10 max-w-3xl text-lg text-gray-600">
                    Bij The Hair Hub nemen we jouw privacy serieus. In deze verklaring lees je hoe wij omgaan met jouw persoonsgegevens.
                </p>

                <div class="max-w-3xl text-gray-700 space-y-6 text-base leading-relaxed">
                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Welke gegevens verzamelen we?</h3>
                        <p>We verzamelen gegevens die je zelf aan ons verstrekt, zoals wanneer je een afspraak maakt, contact met ons opneemt of je aanmeldt voor een actie.</p>
                        <ul class="list-disc list-inside mt-2 space-y-1">
                            <li>Naam</li>
                            <li>Telefoonnummer</li>
                            <li>E-mailadres</li>
                            <li>Afspraakgegevens</li>
                            <li>Voorkeuren of opmerkingen over behandelingen</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Waarom verzamelen we deze gegevens?</h3>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Voor het maken en beheren van afspraken</li>
                            <li>Voor communicatie over je bezoek</li>
                            <li>Om je op de hoogte te houden van aanbiedingen (alleen als je toestemming hebt gegeven)</li>
                            <li>Voor verbetering van onze service</li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Delen wij jouw gegevens?</h3>
                        <p>We delen jouw gegevens nooit zonder jouw toestemming, tenzij dit wettelijk verplicht is of nodig is voor onze dienstverlening (zoals via een afsprakenapp). In dat geval zorgen wij dat jouw gegevens veilig blijven via een verwerkersovereenkomst.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Beveiliging</h3>
                        <p>We nemen technische en organisatorische maatregelen om jouw gegevens te beschermen tegen verlies of onrechtmatige toegang.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Bewaartermijn</h3>
                        <p>We bewaren jouw gegevens niet langer dan nodig is, of zolang als wettelijk vereist is.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Jouw rechten</h3>
                        <p>Je hebt recht op inzage, correctie of verwijdering van jouw gegevens. Ook kun je bezwaar maken tegen verwerking of vragen om overdracht van je gegevens.</p>
                        <p class="mt-2">Stuur hiervoor een e-mail naar <a href="mailto:contact@example.com" class="text-purple-700 underline">contact@example.com</a>.</p>
                    </div>

                    <div>
                        <h3 class="text-xl font-semibold text-purple-700 mb-2">Contactgegevens</h3>
                        <p>
                            <strong>The Hair Hub</strong><br>
                            E-mail: <a href="mailto:contact@example.com" class="text-purple-700 underline">contact@example.com</a><br>
                            Adres: Boumaboulevard 1 - 1234 AB<br>
                            KvK: 123456
                        </p>
                    </div>
                </div>
            </section> 
        </div>
    </FrontLayout>
</template>