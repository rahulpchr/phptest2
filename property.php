<?php
// Include the database connection
include('includes/dbconnect.php');

// Get the property ID from the URL
$property_id = isset($_GET['id']) ? $_GET['id'] : 1;  // Default to 1 if no id is provided

// Query to get property data
$sql = "SELECT * FROM properties WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $property_id);  // Bind the id to the query
$stmt->execute();
$result = $stmt->get_result();

// Check if property data is found
if ($result->num_rows > 0) {
    // Fetch the data
    $property = $result->fetch_assoc();
} else {
    echo "Property not found.";
    exit();
}

// Query to get amenities for this property
$amenities_sql = "SELECT * FROM amenities WHERE property_id = ?";
$amenities_stmt = $conn->prepare($amenities_sql);
$amenities_stmt->bind_param("i", $property_id);
$amenities_stmt->execute();
$amenities_result = $amenities_stmt->get_result();
$amenities = [];
while ($amenity = $amenities_result->fetch_assoc()) {
    $amenities[] = $amenity['amenity_name'];
}

// ✅ Query to get map iframe for this property
$map_sql = "SELECT iframe_url FROM map_iframe WHERE property_id = ?";
$map_stmt = $conn->prepare($map_sql);
$map_stmt->bind_param("i", $property_id);
$map_stmt->execute();
$map_result = $map_stmt->get_result();
$map_iframe = '';
if ($map_result->num_rows > 0) {
    $map_row = $map_result->fetch_assoc();
    $map_iframe = $map_row['iframe_url'];
}

// Map amenity names to Font Awesome icons
$amenityIcons = [
    'Swimming Pool'     => 'fas fa-swimming-pool',
    'Gym'               => 'fas fa-dumbbell',
    'Parking'           => 'fas fa-parking',
    'Lift'              => 'fas fa-elevator', // requires Font Awesome Pro; fallback below
    'Power Backup'      => 'fas fa-bolt',
    'Security'          => 'fas fa-shield-alt',
    'Club House'        => 'fas fa-building',
    'Garden'            => 'fas fa-tree',
    'Kids Play Area'    => 'fas fa-child',
    'Intercom'          => 'fas fa-phone-alt',
    'CCTV'              => 'fas fa-video',
    'Fire Safety'       => 'fas fa-fire-extinguisher',
    'Water Supply'      => 'fas fa-tint',
    'Internet'          => 'fas fa-wifi',
    // Add more as needed
];

function formatIndianCurrency($amount) {
    if ($amount >= 10000000) {
        return number_format($amount / 10000000, 2) . ' Cr';
    } elseif ($amount >= 100000) {
        return number_format($amount / 100000, 2) . ' Lac';
    } elseif ($amount >= 1000) {
        return number_format($amount / 1000, 2) . ' Thousand';
    } else {
        return number_format($amount, 2);
    }
}

// Example usage:
$formattedPrice = formatIndianCurrency($property['price']);

?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bilasur RealEstate Properties</title>
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/7133/7133252.png" type="image/png">

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

  <div class="max-w-7xl mx-auto mt-2">
 <!-- Breadcrumb -->
  <div class="text-sm text-gray-500 mb-4">
    <a href="#" class="hover:underline">home</a> /
    <a href="#" class="hover:underline">project</a> /
    <span class="text-yellow-600 font-semibold"><?php echo htmlspecialchars($property['name']); ?></span>
  </div>

  <!-- Main Card Section -->
  <div class="flex flex-col lg:flex-row gap-6">
    <!-- Left Section -->
    <div class="bg-white shadow-md rounded-lg p-4 w-full lg:w-2/3">
      <h1 class="text-xl font-semibold mb-4"><?php echo htmlspecialchars($property['name']); ?></h1>
      <img src="<?php echo htmlspecialchars($property['image']); ?>" alt="<?php echo htmlspecialchars($property['image']); ?> image" class="rounded-lg mb-4 w-full h-auto">

      <div class="text-gray-700 flex items-center gap-2 mb-2">
  <i class="fas fa-map-marker-alt text-red-500"></i>
  <span><?php echo htmlspecialchars($property['address']); ?></span>
</div>


      <div class="flex items-center flex-wrap gap-4 text-sm">
        <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded">PCGRERA280618000367</span>
        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">Under Construction</span>
        <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded"><?php echo $property['viewcount']; ?> Views</span>
      

        <!-- Like & Share Buttons Aligned Right -->
  <div class="ml-auto flex gap-2">
  <!-- Like Button -->
  <button class="text-red-500 hover:text-red-500 text-lg">
    <i class="fas fa-heart"></i>
  </button>

  <!-- Share Button -->
  <button class="text-blue-500 hover:text-blue-500 text-lg">
    <i class="fas fa-share-alt"></i>
  </button>
</div>

</div>

<!-- Swastik Group Card -->
<div class="bg-white rounded-lg shadow p-4 mb-4 mt-16">
  <div class="flex items-start gap-4">
    <img src="https://png.pngtree.com/png-clipart/20240722/original/pngtree-user-profile-icon-image-vector-png-image_15611025.png" alt="Swastik Group Logo" class="w-14 h-14 rounded-full">
    <div>
      <h2 class="font-semibold text-lg">Swastik Group</h2>
      <p class="text-gray-400 text-sm mt-1">
        Swastik Group Raipur is a prominent real estate developer in the city of Raipur, Chhattisgarh, India.
        The group has been in the business for over two decades and has successfully completed numerous re...
      </p>
    </div>
  </div>
</div>

<!-- Description Box -->
<div class="bg-white rounded-lg shadow p-4 mb-4">
  <h3 class="font-semibold text-lg mb-2 text-yellow-600">Description</h3>
  <p class="text-gray-400 text-sm leading-relaxed">
    <?php echo htmlspecialchars($property['description']); ?>
    <a href="#" class="text-blue-500 hover:underline">Read More</a>
  </p>
</div>

<!-- Price & Area Overview -->
<div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center text-sm bg-white shadow rounded-lg p-4 mb-6">
  <div>
    <div class="font-semibold text-gray-800"><?php echo $formattedPrice ?></div>
    <div class="text-gray-500">Start Price</div>
  </div>
  <div>
    <div class="font-semibold text-gray-800">27.82 Lac</div>
    <div class="text-gray-500">End Price</div>
  </div>
  <div>
    <div class="font-semibold text-gray-800"><?php echo htmlspecialchars($property['area']); ?> Sqft</div>
    <div class="text-gray-500">Area Start</div>
  </div>
  <div>
    <div class="font-semibold text-gray-800">1074 Sqft</div>
    <div class="text-gray-500">Area End</div>
  </div>
</div>

<!-- Flat Listing Section -->
<div class="mb-4">
  <h3 class="uppercase text-yellow-600 font-semibold text-sm mb-2"><?php echo htmlspecialchars($property['type']); ?></h3>
  
  <!-- Flat Tabs -->
  <div class="flex gap-2 mb-4">
    <button class="bg-blue-900 text-white text-sm font-semibold px-4 py-1 rounded">2 BHK</button>
    <!-- Add more tabs here if needed -->
  </div>

  <!-- Flat Card -->
  <div class="bg-white rounded-lg shadow p-4">
    <div class="grid grid-cols-2 md:grid-cols-4 text-center text-sm mb-4">
      <div>
        <div class="font-semibold">983 sqft</div>
        <div class="text-gray-500">Start Area</div>
      </div>
      <div>
        <div class="font-semibold">983 sqft</div>
        <div class="text-gray-500">End Area</div>
      </div>
      <div>
        <div class="font-semibold">25.46 L</div>
        <div class="text-gray-500">Start Price</div>
      </div>
      <div>
        <div class="font-semibold">25.46 L</div>
        <div class="text-gray-500">End Price</div>
      </div>
    </div>
    
    <!-- Flat Image -->
    <img src="<?php echo htmlspecialchars($property['image']); ?>" alt="2 BHK Flat" class="w-full rounded-lg mb-4" />

    <!-- Label -->
    <div class="text-sm bg-blue-100 text-blue-800 inline-block px-3 py-1 rounded font-semibold">
      2bhk
    </div>

    <!-- Additional Flat Data (optional) -->
    <div class="grid grid-cols-2 md:grid-cols-4 text-center text-sm mt-4">
      <div>
        <div class="font-semibold">1041 sqft</div>
        <div class="text-gray-500">Start Area</div>
      </div>
      <div>
        <div class="font-semibold">1041 sqft</div>
        <div class="text-gray-500">End Area</div>
      </div>
      <div>
        <div class="font-semibold">27.07 L</div>
        <div class="text-gray-500">Start Price</div>
      </div>
      <div>
        <div class="font-semibold">27.07 L</div>
        <div class="text-gray-500">End Price</div>
      </div>
    </div>
  </div>
</div>


<!-- <div class="max-w-screen-xl mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">Amenities</h2>
  <div class="grid grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
    <div class="flex flex-col items-center">
      <img src="path/to/cafe-icon.png" alt="Nearby Cafe" class="w-16 h-16 mb-2" />
      <span class="text-sm">Nearby Cafe</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/security-icon.png" alt="24 Hr Security" class="w-16 h-16 mb-2" />
      <span class="text-sm">24 Hr. Security</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/bachelor-icon.png" alt="Bachelor Friendly" class="w-16 h-16 mb-2" />
      <span class="text-sm">Bachelor Friendly</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/water-purifier-icon.png" alt="Water Purifier" class="w-16 h-16 mb-2" />
      <span class="text-sm">Water Purifier</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/park-icon.png" alt="Park" class="w-16 h-16 mb-2" />
      <span class="text-sm">Park</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/temple-icon.png" alt="Temple" class="w-16 h-16 mb-2" />
      <span class="text-sm">Temple</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/water-availability-icon.png" alt="24 Hr. Water Availability" class="w-16 h-16 mb-2" />
      <span class="text-sm">24 Hr. Water Availability</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/guards-icon.png" alt="Guards in Colony" class="w-16 h-16 mb-2" />
      <span class="text-sm">Guards in Colony</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/powercut-icon.png" alt="Rare Powercut" class="w-16 h-16 mb-2" />
      <span class="text-sm">Rare Powercut</span>
    </div>
    <div class="flex flex-col items-center">
      <img src="path/to/tiles-icon.png" alt="Tiles" class="w-16 h-16 mb-2" />
      <span class="text-sm">Tiles</span>
    </div>
  </div>
</div>
 -->



 <div class="max-w-screen-xl mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">Amenities</h2>
  <div class="grid grid-cols-6 md:grid-cols-7 lg:grid-cols-8 gap-[5px]">
    <?php foreach ($amenities as $amenity): 
        $iconClass = isset($amenityIcons[$amenity]) ? $amenityIcons[$amenity] : 'fas fa-check-circle';
    ?>
      <div class="flex flex-col items-center text-center">
        <i class="<?php echo $iconClass; ?> text-3xl mb-2 text-blue-300"></i>
        <span class="text-sm text-gray-300"><?php echo htmlspecialchars($amenity); ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<div class="max-w-screen-xl mx-auto p-4">
  <h2 class="text-2xl font-semibold mb-4">Google Map Location</h2>
  <div>
    <?php if (!empty($map_iframe)): ?>
    <div class="property-map">
        <?= $map_iframe ?>
    </div>
<?php else: ?>
    <p>No map available for this property.</p>
<?php endif; ?>

  </div>
</div>



    </div>





    <!-- Right Section -->
    <div class="w-full lg:w-1/3 space-y-4">
      <div class="bg-white p-4 shadow-md rounded-lg">
        <img src="https://is1-3.housingcdn.com/4f2250e8/6e88f8e1ab4d1f4a4cf85101c01d693e/v5/fs/vastu_shikhar-sakri-bilaspur-vastubhoomi_real_estate_india_pvt_ltd.jpg" alt="Swarnabhoomi Ad" class="rounded-lg mb-4">
        <button class="w-full bg-yellow-500 text-white font-semibold py-2 rounded hover:bg-yellow-600 flex items-center justify-center gap-2">
  <i class="fas fa-phone-alt"></i>
  GET MOBILE NUMBER
</button>

      </div>
    </div>
  </div>


</div>

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


 

</body>
</html>
