<?php
include 'includes/dbconnect.php';

$sql = "SELECT * FROM properties ORDER BY id DESC";
$result = $conn->query($sql);

function formatIndianPrice($amount) {
    if ($amount >= 10000000) {
        return  round($amount / 10000000, 2) . ' Crore';
    } elseif ($amount >= 100000) {
        return round($amount / 100000, 2) . ' Lakh';
    } elseif ($amount >= 1000) {
        return '' . round($amount / 1000, 2) . ' Thousand';
    } else {
        return number_format($amount, 2);
    }
}

?>

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
       <a href="index.php"><div class="text-2xl font-bold flex items-center gap-2">
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
    <div class="max-w-screen-xl mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">Property Search</h2>
  <form action="#" method="GET">
    <!-- Search by Locality and Type of Property -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
      <div>
        <label for="locality" class="block text-sm font-medium text-gray-700">Search By Locality</label>
        <input type="text" id="locality" name="locality" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Project, Localities..." required>
      </div>

      <div>
        <label for="property-type" class="block text-sm font-medium text-gray-700">Type of Property</label>
        <select id="property-type" name="property-type" class="w-full p-2 border border-gray-300 rounded-md">
          <option value="">Select</option>
          <option value="flat">Flat</option>
          <option value="villa">Villa</option>
          <option value="plot">Plot</option>
          <option value="office">Office</option>
        </select>
      </div>

      <div>
        <label for="configuration" class="block text-sm font-medium text-gray-700">Configuration</label>
        <select id="configuration" name="configuration" class="w-full p-2 border border-gray-300 rounded-md">
          <option value="flat">Flat</option>
          <option value="villa">Villa</option>
          <option value="studio">Studio</option>
        </select>
      </div>
    </div>

    <!-- Budget Range Slider -->
    <div class="mb-6">
      <label for="budget" class="block text-sm font-medium text-gray-700">Budget</label>
      <div class="flex justify-between mb-2">
        <span class="text-sm">₹1.00L</span>
        <span class="text-sm">₹10.00Cr</span>
      </div>
      <input type="range" id="budget" name="budget" min="100000" max="1000000000" step="10000" class="w-full" />
      <div class="flex justify-between mt-2">
        <span class="text-sm">Average Price is ₹5.00Cr</span>
      </div>
    </div>

    <!-- Possessions -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
      <div>
        <label class="block text-sm font-medium text-gray-700">Possessions</label>
        <div class="flex items-center">
          <input type="radio" id="both" name="possession" value="both" class="mr-2" />
          <label for="both" class="text-sm">Both</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="ready" name="possession" value="ready" class="mr-2" />
          <label for="ready" class="text-sm">Ready to Move</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="under-construction" name="possession" value="under-construction" class="mr-2" />
          <label for="under-construction" class="text-sm">Under Construction</label>
        </div>
      </div>

      <!-- Furnishing -->
      <div>
        <label class="block text-sm font-medium text-gray-700">By Furnishing</label>
        <div class="flex items-center">
          <input type="radio" id="furnishing-all" name="furnishing" value="all" class="mr-2" checked />
          <label for="furnishing-all" class="text-sm">All</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="furnishing-unfurnished" name="furnishing" value="unfurnished" class="mr-2" />
          <label for="furnishing-unfurnished" class="text-sm">Unfurnished</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="furnishing-semi" name="furnishing" value="semi" class="mr-2" />
          <label for="furnishing-semi" class="text-sm">Semi Furnished</label>
        </div>
        <div class="flex items-center">
          <input type="radio" id="furnishing-furnished" name="furnishing" value="furnished" class="mr-2" />
          <label for="furnishing-furnished" class="text-sm">Furnished</label>
        </div>
      </div>

      <!-- BHK Configuration -->
      <div>
        <label for="bhk" class="block text-sm font-medium text-gray-700">BHK Configuration</label>
        <select id="bhk" name="bhk" class="w-full p-2 border border-gray-300 rounded-md">
          <option value="all">All</option>
          <option value="1bhk">1 BHK</option>
          <option value="2bhk">2 BHK</option>
          <option value="3bhk">3 BHK</option>
          <option value="4bhk">4 BHK</option>
        </select>
      </div>
    </div>

    <!-- Search Button -->
    <div class="text-center">
      <button type="submit" class="bg-orange-500 text-white py-2 px-6 rounded-md text-lg">SEARCH</button>
    </div>
  </form>
</div>

  </section>




 <div class="max-w-screen-xl mx-auto p-4">
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
  
    <!-- Left Section: Property Listings (2/3 width) -->
    <div class="md:col-span-2 space-y-6">
      
      <?php if ($result->num_rows > 0): ?>
        <?php while($property = $result->fetch_assoc()): ?>
        <a href="property.php?id=<?= htmlspecialchars($property['id']) ?>">
  <div class="border rounded-xl overflow-hidden shadow hover:shadow-lg transition flex flex-col md:flex-row">
    
    <!-- Image -->
    <img src="<?= htmlspecialchars($property['image']) ?>" alt="Property Image" class="w-full md:w-1/3 h-48 md:h-auto object-cover" />
    
    <!-- Content -->
    <div class="p-4 flex flex-col justify-between flex-1">
      <div>
        <h3 class="font-bold text-lg"><?= htmlspecialchars($property['name']) ?></h3>
        <p class="text-sm text-gray-600">
          <i class="fas fa-map-marker-alt text-red-600 mr-1"></i>
          <?= htmlspecialchars($property['address']) ?>
        </p>
      </div>

      <div class="flex flex-wrap items-center justify-between">
        <p class="text-sm text-gray-500"><span class="text-blue-500 ml-6">Region:</span> <?= htmlspecialchars($property['region']) ?></p>
        <span class="inline-block text-sm bg-green-100 text-green-600 font-medium px-2 py-1 rounded mt-1 md:mt-0">
          <?= htmlspecialchars($property['type']) ?>
        </span>
        <span class="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded"><?php echo $property['viewcount']; ?> Views</span>
      </div>

      <p class="text-lg font-semibold text-orange-600 mt-2">
        <i class="fas fa-rupee-sign text-yellow-500 mr-1"></i>
        <?= formatIndianPrice($property['price'], 2) ?> / sqft
      </p>
    </div>

  </div>
</a>

        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-gray-600">No properties found.</p>
      <?php endif; ?>

      <!-- Pagination (moved inside left column) -->
      <div class="flex justify-center mt-8">
        <ul class="flex space-x-2">
          <li><button class="bg-gray-300 p-2 rounded">1</button></li>
          <li><button class="bg-gray-300 p-2 rounded">2</button></li>
          <li><button class="bg-gray-300 p-2 rounded">3</button></li>
          <li><button class="bg-gray-300 p-2 rounded">4</button></li>
          <li><button class="bg-gray-300 p-2 rounded">5</button></li>
          <li><button class="bg-gray-300 p-2 rounded">...</button></li>
          <li><button class="bg-gray-300 p-2 rounded">Next</button></li>
        </ul>
      </div>

    </div>

    <!-- Right Section: Callback Form (1/3 width) -->
    <div class="md:col-span-1 bg-white shadow-lg rounded-lg p-6">
      <!-- Sidebar content as is -->
      <div class="relative">
  <!-- Image -->
  <img src="https://is1-3.housingcdn.com/4f2250e8/6e88f8e1ab4d1f4a4cf85101c01d693e/v5/fs/vastu_shikhar-sakri-bilaspur-vastubhoomi_real_estate_india_pvt_ltd.jpg" alt="Swarnabhoomi Ad" class="rounded-lg mb-4 w-full">

  <!-- AD Label in the top right corner -->
  <span class="absolute top-2 right-2 bg-[#b0b5b38a] text-white px-1">AD</span>

  <!-- Button below the image -->
  <button class="w-full bg-yellow-500 text-white font-semibold py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
    <i class="fas fa-phone-alt"></i>
    GET MOBILE NUMBER
  </button>
</div>


      

      <h2 class="text-2xl my-4">Request a CallBack</h2>
      <form action="#" method="POST">
        <div class="mb-4">
          <label for="full-name" class="block text-sm font-medium text-gray-700">Enter Full Name</label>
          <input type="text" id="full-name" name="full-name" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Full Name" required>
        </div>
        <div class="mb-4">
          <label for="mobile-number" class="block text-sm font-medium text-gray-700">Enter Mobile Number</label>
          <input type="tel" id="mobile-number" name="mobile-number" class="w-full p-2 border border-gray-300 rounded-md" placeholder="+91 Enter Mobile Number" required>
        </div>
        <div class="mb-4">
          <label for="email-id" class="block text-sm font-medium text-gray-700">Enter Email ID</label>
          <input type="email" id="email-id" name="email-id" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Enter Email ID" required>
        </div>
        <div class="mb-4">
          <label for="remark" class="block text-sm font-medium text-gray-700">Remark</label>
          <textarea id="remark" name="remark" rows="4" class="w-full p-2 border border-gray-300 rounded-md" placeholder="Remark" required></textarea>
        </div>
        <button type="submit" class="w-full p-2 bg-orange-500 text-white rounded-md">SUBMIT</button>
      </form>
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
    <h2 class="text-3xl font-bold mb-4">View Properties verified By HousingCart</h2>
    <p class="text-lg">Verified By Team Of housingcart. Buy with full trust</p>
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
