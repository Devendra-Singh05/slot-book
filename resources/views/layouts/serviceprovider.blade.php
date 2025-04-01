<x-app-layout>
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Schedule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .sidebar {
    width: 250px;
    height: calc(100vh - 60px); /* Navbar 60px का है, तो उसकी जगह छोड़ दो */
    background: #212529;
    color: white;
    position: fixed;
    top: 60px; /* Navbar की height जितना gap */
    left: 0;
    padding: 20px;
    overflow-y: auto; /* अगर ज्यादा Links हों तो Scroll */
}


    .sidebar a {
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        padding: 12px;
        border-radius: 5px;
        margin: 5px 0;
    }

    .sidebar a i {
        margin-right: 10px;
    }

    .sidebar a:hover {
        background: #495057;
    }

 {{-- .content {
    position: fixed;
    top: 64px; /* Navbar की Height */
    left: 250px; /* Sidebar के बराबर */
    width: calc(100% - 250px); /* Sidebar के बाद बची हुई पूरी Width */
    height: 60px; /* Heading Bar की Height */
    background: #f8f9fa; /* हल्का Gray बैकग्राउंड (अगर चाहिए) */
    color: black;
    padding: 15px;
    display: flex;
    align-items: center;
    justify-content: center; /* Heading को Center में लाने के लिए */
    font-size: 20px; /* टेक्स्ट साइज */
    font-weight: bold; /* टेक्स्ट बोल्ड */
    z-index: 1000;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* हल्का Shadow */
}
--}}
    .main-wrapper {
    margin-left: 250px;
    margin-top: 60px; /* Header के नीचे space */
    height: calc(100vh - 60px); /* Sidebar और Header के बाद बचा हुआ space */
    display: flex;
    flex-direction: column;
}
    .card {
        border: none;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
    }

    .card:hover {
        transform: scale(1.03);
    }

    .table-container {
        max-height: 300px;
        /* Table के लिए Fixed Height */
        /* overflow-y: auto; */
        /* Vertical Scroll Enable करें */
        border: 1px solid #ddd;
        /* Table को Border देना */
    }

    .table thead {
        position: sticky;
        top: 0;
        background: #343a40;
        /* Header को Dark Background देना */
        color: white;
        z-index: 2;
    }
  
  /* 🔹 Scrollable Section Content */
.section-content {
    flex-grow: 1; /* बाकी जगह भरने के लिए */
    /* overflow-y: auto; ✅ सिर्फ यही scroll होगा */
    padding: 20px;
}
  </style>
</head>

<body>
    <aside class="sidebar">
        <h3 class="text-center">Welcome {{ Auth::user()->name }}</h3>
        <a href="/firm"><i class="fas fa-home"></i> Home</a>
        <a href="/firm/create"><i class="fas fa-building"></i> Add New Firms</a>
        <a href="/schedule"><i class="fas fa-calendar"></i> Schedules</a>
        <a href="#"><i class="fas fa-cog"></i> Settings</a>
    </aside>
    <div class="content">
        <h2 class="mb-4">@yield('heading')</h2>
    </div>
        <div class="main-wrapper" >
        <div class="section-content" >
@yield('content')
</div>
    </div>
   

</body>
</html>
</x-app-layout>