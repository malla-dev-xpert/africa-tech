<!doctype html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>


<body class="font-sans text-gray-800">

    <?php require __DIR__ . '/../src/components/header.php'; ?>

    <section class="relative min-h-[90vh] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://soleosenergy.com/wp-content/uploads/2024/07/Solar-Energy-Company-in-India.jpg" alt="Engineers" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-[#001c37] via-[#001c37]/80 to-transparent"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 w-full text-white">
            <div class="flex items-center gap-2 mb-6">
                <span class="w-10 h-[2px] bg-green-500"></span>
                <span class="uppercase text-xs font-bold tracking-[0.2em] text-green-500">Des solutions intelligentes pour un monde durable</span>
            </div>

            <h1 class="text-5xl md:text-8xl font-black leading-[0.9] mb-8">
                Africa <span class="text-green-500"> Tech</span><br>
                solutions fiables en énergie.

            </h1>

            <p class="text-gray-300 text-lg md:text-xl max-w-lg mb-12">
                Nous accompagnons particuliers, entreprises et institutions avec des solutions fiables, durables et adaptées à chaque projet.
            </p>

            <a href="#" class="bg-white text-[#001c37] px-10 py-5 rounded font-bold uppercase text-sm hover:bg-green-500 hover:text-white transition-all">
                Découvrir Maintenant
            </a>
        </div>
    </section>

    <script src="assets/js/app.js"></script>
</body>

</html>