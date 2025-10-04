<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bilasur RealEstate Properties</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/256/9187/9187548.png" type="image/png">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .floating-btn {
      position: fixed;
      width: 60px;
      height: 60px;
      z-index: 50;
    }
    .whatsapp-btn {
      left: 20px;
      bottom: 20px;
    }
    .call-btn {
      right: 20px;
      bottom: 20px;
    }
    .floating-btn img {
      animation: bounce 2s infinite;
    }
    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-5px);
      }
    }
  </style>
</head>
<body class="bg-white text-gray-800">

  <!-- Header -->
  <header class="bg-blue-900 text-white px-4 py-3">
    <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center justify-between gap-4">
      <!-- Logo & Location -->
      <div class="flex items-center gap-4 w-full lg:w-auto">
       <a href="index.php"> <div class="text-2xl font-bold flex items-center gap-2">
          <i class="fas fa-home text-yellow-400"></i> Bilaspur Properties
        </div></a>
        <select class="bg-white text-gray-700 px-3 py-1 rounded text-sm">
          <option>BILASPUR</option>
          <option>RAIPUR</option>
          <option>DELHI</option>
        </select>
      </div>

      <!-- Search Bar -->
      <div class="flex-grow w-full lg:w-auto">
        <div class="relative w-full max-w-xl mx-auto">
          <input type="text" placeholder="Search by Locality/Project/Builder..." class="w-full px-4 py-2 rounded-full text-gray-800 focus:outline-none" />
          <i class="fas fa-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex items-center gap-4 w-full lg:w-auto justify-center lg:justify-end">
        <button class="bg-white text-blue-900 px-4 py-1 rounded-full text-sm font-semibold">Post Property</button>
        <button class="border border-white px-4 py-1 rounded-full text-sm font-semibold">Login</button>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="text-center bg-gray-200 py-12">
    <h1 class="text-4xl md:text-5xl font-bold text-blue-900">WE ARE IN <span class="text-blue-700">BILASPUR</span> NOW!</h1>
    <p class="mt-4 text-sm font-semibold text-gray-700 max-w-xl mx-auto px-4">
      THIRD FLOOR, QASBA BUILDING, ABOVE MERAKI, VIP ESTATE, SHANKAR NAGAR, RAIPUR (C.G)
    </p>
  </section>

  <!-- Category Dock -->
  <section class="bg-white shadow-md rounded-xl max-w-5xl mx-auto -mt-10 p-6 flex flex-wrap justify-center gap-10 z-10 relative">
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-home text-2xl text-blue-700"></i>
      <span>Buy</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-handshake text-2xl text-blue-700"></i>
      <span>Rent</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-user-friends text-2xl text-blue-700"></i>
      <span>PG</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-building text-2xl text-blue-700"></i>
      <span>Project</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-user-tie text-2xl text-blue-700"></i>
      <span>Agents</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-tools text-2xl text-blue-700"></i>
      <span>Builders</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-calculator text-2xl text-blue-700"></i>
      <span>Evaluate</span>
    </div>
    <div class="flex flex-col items-center text-sm font-medium text-gray-700">
      <i class="fas fa-star text-2xl text-blue-700"></i>
      <span>HCVerified</span>
    </div>
  </section>

<!-- One Stop Destination Section -->
<section class="bg-gray-50 py-10 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-semibold mb-6">
      One Stop Destination by <span class="text-yellow-500 font-bold">Bilaspur Properties</span>
    </h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
      <!-- Card -->
      <div class="relative rounded-lg overflow-hidden group cursor-pointer">
        <img src="https://storage.googleapis.com/realtyplusmag-news-photo/news-photo/107296.mumbai-suburbs.png" alt="Agents" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
        <div class="absolute inset-0 bg-black bg-opacity-40 p-4 flex flex-col justify-between text-white">
          <div class="font-semibold">HousingCart Assured <span class="text-yellow-400">Agents</span></div>
          <div class="text-lg">Explore <i class="fas fa-arrow-right ml-1"></i></div>
        </div>
      </div>

      <!-- Repeat for other cards -->
      <div class="relative rounded-lg overflow-hidden group cursor-pointer">
        <img src="https://assets.gqindia.com/photos/60f96f3119900248e3af9ee4/16:9/w_2560%2Cc_limit/Expensive%2520properties%2520in%2520Mumbai%2520.jpg" alt="Projects" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
        <div class="absolute inset-0 bg-black bg-opacity-40 p-4 flex flex-col justify-between text-white">
          <div class="font-semibold">HousingCart Assured <span class="text-yellow-400">Projects</span></div>
          <div class="text-lg">Explore <i class="fas fa-arrow-right ml-1"></i></div>
        </div>
      </div>

      <div class="relative rounded-lg overflow-hidden group cursor-pointer">
        <img src="https://housiey.com/blogs/wp-content/uploads/2024/11/Will-Property-Prices-Fall-in-Mumbai-Yes-or-No-Why.jpg" alt="Properties" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
        <div class="absolute inset-0 bg-black bg-opacity-40 p-4 flex flex-col justify-between text-white">
          <div class="font-semibold">HousingCart Assured <span class="text-yellow-400">Properties</span></div>
          <div class="text-lg">Explore <i class="fas fa-arrow-right ml-1"></i></div>
        </div>
      </div>

      <div class="relative rounded-lg overflow-hidden group cursor-pointer">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT69qar6WNtZG4-pE7e2slwJApa_QCLO0YyPA&s" alt="Builders" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
        <div class="absolute inset-0 bg-black bg-opacity-40 p-4 flex flex-col justify-between text-white">
          <div class="font-semibold">HousingCart Assured <span class="text-yellow-400">Builders</span></div>
          <div class="text-lg">Explore <i class="fas fa-arrow-right ml-1"></i></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Trending Projects Section -->
<section class="bg-white py-10 px-4">
  <div class="max-w-7xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-2xl md:text-3xl font-semibold">
        Trending Project in <span class="text-yellow-500 font-bold">Bilaspur</span>
      </h2>
      <a href="#" class="text-gray-600 hover:text-blue-600 text-sm font-medium">View more</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      <!-- Project Card -->
      <div class="border rounded-xl overflow-hidden shadow hover:shadow-lg transition">
        <div class="relative">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQp8B7lOzVb2D9rcmfMZgMT8IxOUBn6t5DMmA&s" alt="Vastu Suman" class="w-full h-40 object-cover" />
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-lg mb-1">Vastu Suman</h3>
          <span class="text-xs bg-green-100 text-green-600 font-medium px-2 py-1 rounded">Villa</span>
          <p class="text-sm text-gray-600 mt-2"><i class="fas fa-map-marker-alt text-orange-400"></i> BILASPUR, CHHATTISGARH</p>
          <p class="text-sm text-gray-800 mt-1 font-semibold">
            <i class="fas fa-rupee-sign text-yellow-500"></i> Starting from ₹ 7L
          </p>
        </div>
      </div>

      <!-- Repeat for other 3 cards -->
      <div class="border rounded-xl overflow-hidden shadow hover:shadow-lg transition">
        <div class="relative">
          <img src="https://destinationcompress.s3.ap-south-1.amazonaws.com/ce2cf920-834d-4aad-8442-d8e72dbcb839.jpeg" alt="Ambience Business Park" class="w-full h-40 object-cover" />
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-lg mb-1">Ambience Business Park</h3>
          <span class="text-xs bg-orange-100 text-orange-600 font-medium px-2 py-1 rounded">Shop/Office</span>
          <p class="text-sm text-gray-600 mt-2"><i class="fas fa-map-marker-alt text-orange-400"></i> BILASPUR, CHHATTISGARH</p>
          <p class="text-sm text-gray-800 mt-1 font-semibold">
            <i class="fas fa-rupee-sign text-yellow-500"></i> Starting from ₹ 52L
          </p>
        </div>
      </div>

      <div class="border rounded-xl overflow-hidden shadow hover:shadow-lg transition">
        <div class="relative">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxNBS4uJYjIJljFRIzGk5q_kBMv2r585yLtv7M9O6VVUmAIARbC79j0MNMSb6pYIUvttg&usqp=CAU" alt="Arpa Complex" class="w-full h-40 object-cover" />
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-lg mb-1">Arpa Complex</h3>
          <span class="text-xs bg-orange-100 text-orange-600 font-medium px-2 py-1 rounded">Shop/Office</span>
          <p class="text-sm text-gray-600 mt-2"><i class="fas fa-map-marker-alt text-orange-400"></i> BILASPUR, CHHATTISGARH</p>
          <p class="text-sm text-gray-800 mt-1 font-semibold">
            <i class="fas fa-rupee-sign text-yellow-500"></i> Starting from ₹ 40L
          </p>
        </div>
      </div>

      <div class="border rounded-xl overflow-hidden shadow hover:shadow-lg transition">
        <div class="relative">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRqcgDfrmiEeJP5YOJciOj34HQpbWc9Tnbttg&s" alt="Dreams Residency" class="w-full h-40 object-cover" />
          <span class="absolute top-2 right-2 bg-blue-600 text-white text-xs font-semibold px-2 py-1 rounded">Featured</span>
        </div>
        <div class="p-4">
          <h3 class="font-bold text-lg mb-1">Dreams Residency</h3>
          <span class="text-xs bg-blue-100 text-blue-600 font-medium px-2 py-1 rounded">House</span>
          <span class="text-xs bg-gray-100 text-gray-700 font-medium px-2 py-1 rounded ml-2">Plot</span>
          <p class="text-sm text-gray-600 mt-2"><i class="fas fa-map-marker-alt text-orange-400"></i> BILASPUR, CHHATTISGARH</p>
          <p class="text-sm text-gray-800 mt-1 font-semibold">
            <i class="fas fa-rupee-sign text-yellow-500"></i> Starting from ₹ 35L
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="bg-white py-10 px-4">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-2xl md:text-3xl font-semibold mb-6">
      Popular Cities Explored By <span class="text-yellow-500 font-bold">HousingCart</span>
    </h2>

    <div class="grid md:grid-cols-3 gap-6">
      <!-- Left Side: Video / Tall Image -->
      <div class="row-span-2">
        <div class="h-full rounded-lg overflow-hidden">
          <!-- Replace with video if needed -->
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ42EBFIRSjMFjuW3t9YgLjLALWpoUpj7aqYhGqmKKPi1YBmHxkki3PjDeOvWZ4j-RwFKM&usqp=CAU" alt="Raipur Launch" class="w-full h-full object-cover" />
        </div>
      </div>

      <!-- Right Side: Grid of 5 Images -->
      <div class="md:col-span-2 grid grid-cols-2 md:grid-cols-2 gap-4">
        <!-- First Row -->
        <div class="relative group rounded-lg overflow-hidden">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSpdt42uT8ZIaxIXs0-3cKmkjGjv143bvlvog&s" alt="Raipur" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
          <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <span class="text-white font-semibold text-lg">Raipur</span>
          </div>
        </div>

        <div class="relative group rounded-lg overflow-hidden">
          <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRz1hI3U8QxYM2XxqbGqQgtkl4fJeo2SQklfw&s" alt="Bilaspur" class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
          <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <span class="text-white font-semibold text-lg">Bilaspur</span>
          </div>
        </div>

        <!-- Second Row (3 images in one row) -->
        <div class="col-span-2 grid grid-cols-3 gap-4 mt-4">
          <div class="relative group rounded-lg overflow-hidden">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRQcGm8JXoBxsN-oz-0r1NdFOmxjw8PNb0jTQ&s" alt="Mungeli" class="w-full h-36 object-cover group-hover:scale-105 transition duration-300" />
            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
              <span class="text-white font-semibold text-sm">Mungeli</span>
            </div>
          </div>

          <div class="relative group rounded-lg overflow-hidden">
            <img src="https://newprojects.99acres.com/projects/runwal_group/runwal_bliss/images/zj801hck_med.jpg" alt="Rajnandgaon" class="w-full h-36 object-cover group-hover:scale-105 transition duration-300" />
            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
              <span class="text-white font-semibold text-sm">Rajnandgaon</span>
            </div>
          </div>

          <div class="relative group rounded-lg overflow-hidden">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSOL1xR0tSU4V3rFkHMExBUiy7NESn2_rA-iA&s" alt="Champa" class="w-full h-36 object-cover group-hover:scale-105 transition duration-300" />
            <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
              <span class="text-white font-semibold text-sm">Champa</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
 <div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Tabs for Sell, Rent, PG -->
    <div class="border-b border-gray-300">
      <div class="flex space-x-8">
        <button id="sell-tab" class="text-xl font-semibold text-gray-700 hover:text-yellow-500 focus:outline-none">FOR SELL</button>
        <button id="rent-tab" class="text-xl font-semibold text-gray-700 hover:text-yellow-500 focus:outline-none">FOR RENT</button>
        <button id="pg-tab" class="text-xl font-semibold text-gray-700 hover:text-yellow-500 focus:outline-none">FOR PG</button>
      </div>
    </div>

    <!-- Property Listings -->
    <div class="mt-6">
      <div id="sell-listings" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 hidden">
        <!-- First Property -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="https://www.ghar.tv/projectimages/54525/photo-58041.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">Plot For Sale Near Shriram Care...</h3>
            <p class="text-gray-600 mt-2">Price ₹7.50K / sqft</p>
            <p class="text-sm text-gray-500 mt-2">Shriram Care Hospital, Ameri Rd, Nehrunagar...</p>
          </div>
        </div>
        
        <!-- First Property -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiMqoeKaygEAFzj9tdmPTmAXK6GGfMsLos7A&s" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">Plot For Sale Near Shriram Care...</h3>
            <p class="text-gray-600 mt-2">Price ₹7.50K / sqft</p>
            <p class="text-sm text-gray-500 mt-2">Shriram Care Hospital, Ameri Rd, Nehrunagar...</p>
          </div>
        </div>
        <!-- First Property -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="https://newprojects.99acres.com/projects/unknown/maher_select/images/9baqhkz_1744957591_587746883_med.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">Plot For Sale Near Shriram Care...</h3>
            <p class="text-gray-600 mt-2">Price ₹7.50K / sqft</p>
            <p class="text-sm text-gray-500 mt-2">Shriram Care Hospital, Ameri Rd, Nehrunagar...</p>
          </div>
        </div>
        <!-- First Property -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="https://newprojects.99acres.com/projects/unknown/maher_select/images/9baqhkz_1744957591_587746883_med.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">Plot For Sale Near Shriram Care...</h3>
            <p class="text-gray-600 mt-2">Price ₹7.50K / sqft</p>
            <p class="text-sm text-gray-500 mt-2">Shriram Care Hospital, Ameri Rd, Nehrunagar...</p>
          </div>
        </div>



      </div>

      <div id="rent-listings" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 hidden">
        <!-- First Property for Rent -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="property2.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">Plot For Rent in Downtown</h3>
            <p class="text-gray-600 mt-2">Price ₹5K / month</p>
            <p class="text-sm text-gray-500 mt-2">Near City Center, Bilaspur...</p>
          </div>
        </div>
        <!-- Add more "For Rent" properties here -->
      </div>

      <div id="pg-listings" class="tab-content grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 hidden">
        <!-- First Property for PG -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="property3.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">PG Accommodation in Bilaspur</h3>
            <p class="text-gray-600 mt-2">Price ₹3K / month</p>
            <p class="text-sm text-gray-500 mt-2">Near Bilaspur University...</p>
          </div>
        </div>

        <!-- First Property for PG -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="property3.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">PG Accommodation in Bilaspur</h3>
            <p class="text-gray-600 mt-2">Price ₹3K / month</p>
            <p class="text-sm text-gray-500 mt-2">Near Bilaspur University...</p>
          </div>
        </div>

        <!-- First Property for PG -->
        <div class="border p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
          <img class="w-full h-48 object-cover rounded-t-lg" src="property3.jpg" alt="Property">
          <div class="mt-4">
            <h3 class="text-lg font-semibold">PG Accommodation in Bilaspur</h3>
            <p class="text-gray-600 mt-2">Price ₹3K / month</p>
            <p class="text-sm text-gray-500 mt-2">Near Bilaspur University...</p>
          </div>
        </div>
        <!-- Add more "For PG" properties here -->
      </div>
    </div>
  </div>

  
  <div class="max-w-7xl mx-auto px-4 py-6">
    <!-- Top Agents Section -->
    <div class="text-xl font-semibold text-gray-900 mb-4">
      Our Top Agents in Bilaspur
    </div>

    <!-- Horizontally Scrollable Container -->
    <div class="flex space-x-6 overflow-x-auto py-4">
      <!-- Agent 1 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-gray-300 flex items-center justify-center text-white">J</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Jay Rajak</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">5 Experience</p>
          <p class="text-sm text-gray-600">2 Properties</p>
        </div>
      </div>
      <!-- Agent 2 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-green-300 flex items-center justify-center text-white">A</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Anand Pal</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">4 Experience</p>
          <p class="text-sm text-gray-600">0 Properties</p>
        </div>
      </div>
      <!-- Agent 3 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-yellow-300 flex items-center justify-center text-white">S</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Er. S. Surya</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">16 Experience</p>
          <p class="text-sm text-gray-600">0 Properties</p>
        </div>
      </div>
      <!-- Agent 4 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-purple-300 flex items-center justify-center text-white">R</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Ranu D.</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">2 Experience</p>
          <p class="text-sm text-gray-600">2 Properties</p>
        </div>
      </div>
      <!-- Agent 4 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-red-300 flex items-center justify-center text-white">R</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Ranu D.</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">2 Experience</p>
          <p class="text-sm text-gray-600">2 Properties</p>
        </div>
      </div>
      <!-- Agent 4 -->
      <div class="flex-shrink-0 w-48 bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-all">
        <div class="flex items-center justify-center text-2xl font-semibold text-gray-600">
          <span class="rounded-full w-12 h-12 bg-blue-300 flex items-center justify-center text-white">R</span>
        </div>
        <div class="mt-4 text-center">
          <h3 class="font-medium text-gray-700">Ranu D.</h3>
          <p class="text-sm text-gray-500">Housing Expert</p>
          <p class="text-sm text-gray-600 mt-2">2 Experience</p>
          <p class="text-sm text-gray-600">2 Properties</p>
        </div>
      </div>
      <!-- More agents can be added in similar blocks -->
    </div>
  </div>

<div class="max-w-7xl mx-auto px-4 py-6">
    <!-- FAQ Heading -->
    <div class="text-3xl font-bold text-center text-gray-900 mb-8">
      Have got questions in your head?
    </div>

    <!-- FAQ List -->
    <div class="space-y-4">
      <!-- FAQ Item 1 -->
      <div class="border-b pb-4">
        <button class="text-xl text-gray-800 w-full text-left" onclick="toggleFAQ(event)">
          What is HousingCart?
        </button>
        <div class="mt-2 text-gray-600 hidden">
          HousingCart is a platform where you can buy, sell, and rent properties. It also connects you with top agents and builders in your area.
        </div>
      </div>

      <!-- FAQ Item 2 -->
      <div class="border-b pb-4">
        <button class="text-xl text-gray-800 w-full text-left" onclick="toggleFAQ(event)">
          How can I list my property for sale?
        </button>
        <div class="mt-2 text-gray-600 hidden">
          To list your property for sale, simply sign up on HousingCart and navigate to the 'Sell' section where you can submit your property details.
        </div>
      </div>

      <!-- FAQ Item 3 -->
      <div class="border-b pb-4">
        <button class="text-xl text-gray-800 w-full text-left" onclick="toggleFAQ(event)">
          What areas does HousingCart cover?
        </button>
        <div class="mt-2 text-gray-600 hidden">
          HousingCart covers a wide range of areas in various cities, including Bilaspur, Raipur, and other major regions. You can check the available listings for your preferred area.
        </div>
      </div>

      <!-- FAQ Item 4 -->
      <div class="border-b pb-4">
        <button class="text-xl text-gray-800 w-full text-left" onclick="toggleFAQ(event)">
          How do I contact an agent?
        </button>
        <div class="mt-2 text-gray-600 hidden">
          You can directly contact an agent through their profile on HousingCart by clicking on their contact details listed under their name.
        </div>
      </div>
    </div>
  </div>





 <section class="bg-[#FFF0CB] flex flex-row items-center justify-between px-6 py-8 text-center space-x-6">
  <!-- Left Image -->
  <div class="w-1/4 flex justify-center">
    <img src="https://www.housingcart.in/_next/image?url=%2F_next%2Fstatic%2Fmedia%2FCharacter.fba05129.png&w=256&q=75" alt="Left Image" class="w-[120px] h-auto">
  </div>

  <!-- Center Text -->
  <div class="w-1/2">
    <h2 class="text-lg md:text-2xl font-bold mb-4">View Properties verified By HousingCart</h2>
    <p class="text-sm md:text-lg">Verified By Team Of housingcart. Buy with full trust</p>
  </div>

  <!-- Right Image -->
  <div class="w-1/4 flex justify-center">
    <img src="https://www.housingcart.in/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fforward.d2e169e8.png&w=48&q=75" alt="Right Image" class="max-w-full h-auto">
  </div>
</section>

  <img src="https://www.housingcart.in/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Fbanner.3aacd27e.jpg&w=3840&q=75" alt="Full Width Banner" class="w-full h-auto">
<footer class="bg-gray-100 text-gray-700">
  <div class="max-w-7xl mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-4 gap-8">
    <!-- Brand -->
    <div>
      <h2 class="text-2xl font-bold text-yellow-500 mb-2">BilsapurProperties</h2>
      <p class="text-sm text-gray-600">
        Buy, Sell, and Rent your dream properties with trusted builders and agents across Bilaspur and beyond.
      </p>
    </div>

    <!-- Quick Links -->
    <div>
      <h3 class="text-lg font-semibold mb-2">Quick Links</h3>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:text-yellow-500">For Sell</a></li>
        <li><a href="#" class="hover:text-yellow-500">For Rent</a></li>
        <li><a href="#" class="hover:text-yellow-500">For PG</a></li>
        <li><a href="#" class="hover:text-yellow-500">Top Builders</a></li>
        <li><a href="#" class="hover:text-yellow-500">Top Agents</a></li>
        <li><a href="#" class="hover:text-yellow-500">FAQs</a></li>
      </ul>
    </div>

    <!-- Contact Info -->
    <div>
      <h3 class="text-lg font-semibold mb-2">Contact Us</h3>
      <ul class="text-sm space-y-2">
        <li><span class="font-medium">Phone:</span> +91 90092 40385</li>
        <li><span class="font-medium">Email:</span> support@bilaspurproperties.in</li>
        <li><span class="font-medium">Location:</span> Bilaspur, Chhattisgarh</li>
      </ul>
    </div>

    <!-- Social -->
    <div>
      <h3 class="text-lg font-semibold mb-2">Follow Us</h3>
      <div class="flex space-x-4 mt-2">
        <a href="#" class="text-gray-600 hover:text-yellow-500" aria-label="Facebook">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M22,12A10,10,0,1,0,9.7,21.9V14.9H7.1V12h2.6V9.8c0-2.6,1.5-4,3.8-4a15.6,15.6,0,0,1,2.3.2V8.7H14.6c-1.2,0-1.6.8-1.6,1.6V12h2.7l-.4,2.9H13V21.9A10,10,0,0,0,22,12Z"/>
          </svg>
        </a>
        <a href="#" class="text-gray-600 hover:text-yellow-500" aria-label="Twitter">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M22.46 6c-.77.35-1.6.58-2.46.69a4.3 4.3 0 001.88-2.38 8.66 8.66 0 01-2.73 1.05 4.29 4.29 0 00-7.3 3.9A12.16 12.16 0 013 5.1a4.29 4.29 0 001.33 5.72 4.25 4.25 0 01-1.95-.54v.05a4.29 4.29 0 003.44 4.2 4.3 4.3 0 01-1.94.07 4.3 4.3 0 004 2.97A8.6 8.6 0 012 19.54a12.14 12.14 0 006.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19 0-.38-.01-.57A8.72 8.72 0 0024 5.57a8.5 8.5 0 01-2.54.7z"/>
          </svg>
        </a>
        <a href="#" class="text-gray-600 hover:text-yellow-500" aria-label="LinkedIn">
          <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24">
            <path d="M19 0h-14c-2.8 0-5 2.2-5 5v14c0 2.8 2.2 5 5 5h14c2.8 0 5-2.2 5-5v-14c0-2.8-2.2-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.3c-1 0-1.8-.8-1.8-1.7 0-1 .8-1.8 1.8-1.8 1 0 1.8.8 1.8 1.8 0 .9-.8 1.7-1.8 1.7zm13.5 11.3h-3v-5.3c0-1.3 0-3-1.8-3s-2.1 1.4-2.1 2.9v5.4h-3v-10h2.9v1.4h.1c.4-.8 1.5-1.7 3.1-1.7 3.3 0 3.9 2.2 3.9 5.1v5.2z"/>
          </svg>
        </a>
      </div>
    </div>
  </div>

  <!-- Bottom Bar -->
  <div class="bg-gray-200 py-4 text-center text-sm text-gray-500">
    © 2025 Bilaspur Real Estate Properties. All rights reserved.
  </div>
</footer>



  <!-- Floating WhatsApp Button -->
  <div class="floating-btn whatsapp-btn">
    <a href="https://wa.me/919999999999" target="_blank">
      <img src="https://static.vecteezy.com/system/resources/thumbnails/016/716/480/small_2x/whatsapp-icon-free-png.png" alt="WhatsApp" class="w-full h-full" />
    </a>
  </div>

  <!-- Floating Call Button -->
  <div class="floating-btn call-btn">
    <a href="tel:+919999999999">
      <img src="https://i.ibb.co/zhLdLYch/image-removebg-preview-9.png" alt="Call" class="w-full h-full" />
    </a>
  </div>

  <!-- Back to Top Button -->
  <button onclick="window.scrollTo({top: 0, behavior: 'smooth'});" 
          class="fixed bottom-24 right-4 bg-blue-700 text-white px-4 py-2 rounded-full shadow-md hover:bg-blue-800 transition z-50">
    ↑ Top
  </button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/js/all.min.js" integrity="sha512-6BTOlkauINO65nLhXhthZMtepgJSghyimIalb+crKRPhvhmsCdnIuGcVbR5/aQY2A+260iC1OPy1oCdB6pSSwQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Function to switch between tabs
    document.getElementById('sell-tab').addEventListener('click', function() {
      toggleTab('sell');
    });

    document.getElementById('rent-tab').addEventListener('click', function() {
      toggleTab('rent');
    });

    document.getElementById('pg-tab').addEventListener('click', function() {
      toggleTab('pg');
    });

    // Function to show the selected tab and hide others
    function toggleTab(tab) {
      const tabs = ['sell', 'rent', 'pg'];
      
      // Hide all tabs
      tabs.forEach(function(t) {
        document.getElementById(`${t}-listings`).classList.add('hidden');
      });

      // Show the selected tab
      document.getElementById(`${tab}-listings`).classList.remove('hidden');

      // Change active tab style
      tabs.forEach(function(t) {
        document.getElementById(`${t}-tab`).classList.remove('text-yellow-500');
        document.getElementById(`${t}-tab`).classList.add('text-gray-700');
      });
      document.getElementById(`${tab}-tab`).classList.add('text-yellow-500');
    }

    // Initially set "For Sell" tab as active
    toggleTab('sell');
  </script>

  <script>
    function toggleFAQ(event) {
      const answer = event.target.nextElementSibling;
      answer.classList.toggle('hidden');
    }
  </script>

</body>
</html>
