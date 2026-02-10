<!-- Formations Section -->
<section id="formations" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= isset($formationsSectionBadge) ? htmlspecialchars($formationsSectionBadge) : 'Formations' ?></span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-[#001c37] mb-6"><?php if (isset($formationsSectionTitle)): ?><?= htmlspecialchars($formationsSectionTitle) ?><?php else: ?>Formation <span class="text-yellow-400">Professionnelle</span><?php endif; ?></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?= isset($formationsSectionSubtitle) ? htmlspecialchars($formationsSectionSubtitle) : 'Développez vos compétences dans les énergies renouvelables et l\'électricité' ?></p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
            <div class="bg-[#001c37] text-white p-8 rounded-lg slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold mb-4">Formation Installation Solaire</h3>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    Formation complète sur l'installation, la maintenance et le dépannage de systèmes photovoltaïques. Programme pratique avec cas réels et certification à la clé.
                </p>
                <ul class="text-gray-300 mb-6 space-y-2">
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Théorie et pratique
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Certification professionnelle
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Opportunités d'emploi
                    </li>
                </ul>
                <a href="https://wa.me/22395205556?text=Bonjour,%20je%20suis%20intéressé%20par%20la%20formation%20installation%20solaire" target="_blank" rel="noopener" class="inline-block bg-yellow-400 text-white px-6 py-3 rounded font-bold uppercase text-xs hover:bg-yellow-500 transition-all">
                    S'inscrire maintenant
                </a>
            </div>

            <div class="bg-gray-50 p-8 rounded-lg border-2 border-gray-200 slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-[#001c37] mb-4">Formation Électricité Bâtiment</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Maîtrisez les techniques d'installation électrique résidentielle et industrielle. Normes de sécurité, schémas électriques et pratiques professionnelles.
                </p>
                <ul class="text-gray-600 mb-6 space-y-2">
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Approche pratique
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Normes et sécurité
                    </li>
                    <li class="flex items-center gap-2">
                        <span class="text-yellow-400">✓</span> Accompagnement personnalisé
                    </li>
                </ul>
                <a href="https://wa.me/22395205556?text=Bonjour,%20je%20suis%20intéressé%20par%20la%20formation%20électricité%20bâtiment" target="_blank" rel="noopener" class="inline-block bg-[#001c37] text-white px-6 py-3 rounded font-bold uppercase text-xs hover:bg-yellow-400 transition-all">
                    S'inscrire maintenant
                </a>
            </div>
        </div>
    </div>
</section>
