<?php
$currentPage = 'contact';
$pageTitle = 'Contact - AFRICIA TECH';
$pageDescription = 'Contactez AFRICIA TECH pour vos projets énergétiques. Notre équipe est disponible pour répondre à toutes vos questions et vous accompagner dans vos projets solaires.';
require __DIR__ . '/../layouts/main.php';
?>

<!-- Hero Section with Background Image -->
<section class="relative h-[60vh] min-h-[400px] flex items-center justify-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img 
            src="../assets/images/final-cta.jpeg" 
            alt="Contact AFRICIA TECH" 
            class="w-full h-full object-cover"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-[#001c37]/90 via-[#001c37]/80 to-[#001c37]/70"></div>
    </div>
    <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
        <div class="flex items-center justify-center gap-2 mb-4">
            <span class="w-10 h-[2px] bg-yellow-400"></span>
            <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Contact</span>
            <span class="w-10 h-[2px] bg-yellow-400"></span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-4">Contactez-<span class="text-yellow-400">nous</span></h1>
        <p class="text-xl text-gray-300 max-w-3xl mx-auto">Notre équipe est à votre écoute pour répondre à toutes vos questions</p>
    </div>
</section>

<?php
// Titres distincts du hero pour la section contact
$contactSectionBadge = 'Comment nous joindre';
$contactSectionTitle = 'Coordonnées et formulaire';
$contactSectionSubtitle = 'Téléphone, email, adresse ou envoyez-nous un message';
?>
<!-- Contact Section Component -->
<?php require __DIR__ . '/../components/sections/contact.php'; ?>

<!-- Office Hours Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12">
            <div class="slide-up">
                <h2 class="text-3xl font-black text-[#001c37] mb-6">Horaires d'ouverture</h2>
                <div class="bg-white rounded-xl p-8 shadow-lg">
                    <div class="space-y-4">
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="font-bold text-[#001c37]">Lundi - Vendredi</span>
                            <span class="text-gray-600">8h00 - 18h00</span>
                        </div>
                        <div class="flex justify-between items-center pb-4 border-b border-gray-200">
                            <span class="font-bold text-[#001c37]">Samedi</span>
                            <span class="text-gray-600">9h00 - 15h00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-[#001c37]">Dimanche</span>
                            <span class="text-gray-600">Fermé</span>
                        </div>
                    </div>
                    <div class="mt-8 p-4 bg-yellow-50 rounded-lg border-l-4 border-yellow-400">
                        <p class="text-sm text-gray-700">
                            <span class="font-bold text-yellow-400">Urgence ?</span> Notre service de maintenance est disponible 24/7 pour les interventions d'urgence.
                        </p>
                    </div>
                </div>
            </div>

            <div class="slide-up">
                <h2 class="text-3xl font-black text-[#001c37] mb-6">Pourquoi nous contacter ?</h2>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Devis gratuit</h3>
                            <p class="text-gray-600 text-sm">Obtenez un devis détaillé et personnalisé pour votre projet sans engagement.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Conseil expert</h3>
                            <p class="text-gray-600 text-sm">Bénéficiez des conseils de nos experts pour choisir la meilleure solution.</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4 bg-white p-6 rounded-xl shadow-lg">
                        <div class="w-12 h-12 bg-yellow-400 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-[#001c37] mb-2">Réponse rapide</h3>
                            <p class="text-gray-600 text-sm">Nous répondons à toutes vos demandes dans les plus brefs délais.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400">Questions fréquentes</span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-[#001c37] mb-6">Questions <span class="text-yellow-400">Fréquentes</span></h2>
        </div>

        <div class="space-y-4">
            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2">Combien de temps prend une installation solaire ?</h3>
                <p class="text-gray-600 text-sm">Une installation solaire résidentielle prend généralement entre 1 à 3 jours selon la taille du système. Pour les installations commerciales, cela peut prendre jusqu'à une semaine.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2">Quelle est la durée de vie des panneaux solaires ?</h3>
                <p class="text-gray-600 text-sm">Les panneaux solaires ont une durée de vie moyenne de 25 à 30 ans. La plupart des fabricants garantissent une performance minimale de 80% après 25 ans d'utilisation.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2">Proposez-vous des facilités de paiement ?</h3>
                <p class="text-gray-600 text-sm">Oui, nous proposons des solutions de financement adaptées à vos besoins. Contactez-nous pour discuter des options disponibles.</p>
            </div>

            <div class="bg-gray-50 rounded-xl p-6 slide-up">
                <h3 class="font-bold text-[#001c37] mb-2">Les formations sont-elles certifiantes ?</h3>
                <p class="text-gray-600 text-sm">Oui, toutes nos formations délivrent un certificat professionnel reconnu, attestant de vos compétences en énergies renouvelables ou électricité bâtiment.</p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
