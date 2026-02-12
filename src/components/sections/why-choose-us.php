<!-- Why Choose Us Section -->
<section id="why-choose-us" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4">
        <div class="text-center mb-16 slide-up">
            <div class="flex items-center justify-center gap-2 mb-4">
                <span class="w-10 h-[2px] bg-yellow-400"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-yellow-400"><?= t('why.badge') ?></span>
                <span class="w-10 h-[2px] bg-yellow-400"></span>
            </div>
            <h2 class="text-4xl md:text-6xl font-black text-[#001c37] mb-6"><?= t('why.title') ?> <span class="text-yellow-400"><?= t('site.name') ?></span></h2>
            <p class="text-gray-600 max-w-2xl mx-auto"><?= t('why.subtitle') ?></p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Avantage 1 -->
            <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4"><?= t('why.quality_title') ?></h3>
                <p class="text-gray-600 leading-relaxed"><?= t('why.quality_desc') ?></p>
            </div>

            <!-- Avantage 2 -->
            <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4"><?= t('why.expertise_title') ?></h3>
                <p class="text-gray-600 leading-relaxed"><?= t('why.expertise_desc') ?></p>
            </div>

            <!-- Avantage 3 -->
            <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4"><?= t('why.sustainable_title') ?></h3>
                <p class="text-gray-600 leading-relaxed"><?= t('why.sustainable_desc') ?></p>
            </div>

            <!-- Avantage 4 -->
            <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4"><?= t('why.support_title') ?></h3>
                <p class="text-gray-600 leading-relaxed"><?= t('why.support_desc') ?></p>
            </div>

            <!-- Avantage 5 -->
            <div class="bg-gray-50 p-8 rounded-lg hover:shadow-lg transition-shadow slide-up">
                <div class="w-16 h-16 bg-yellow-400 rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-[#001c37] mb-4"><?= t('why.training_title') ?></h3>
                <p class="text-gray-600 leading-relaxed"><?= t('why.training_desc') ?></p>
            </div>
        </div>
    </div>
</section>
