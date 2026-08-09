<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Mechanical Library SP</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #0a0e11;
            color: #fff;
            min-height: 100vh;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #11171c;
            border-right: 1px solid #293239;
            z-index: 1000;
            transition: 0.3s;
        }

        .brand {
            height: 75px;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 20px;
            border-bottom: 1px solid #293239;
        }

        .brand-icon {
            font-size: 32px;
            color: #ff6a00;
        }

        .brand h2 {
            font-size: 16px;
            line-height: 1.2;
        }

        .brand span {
            color: #ff6a00;
        }

        /* ================= MENU ================= */

        .menu {
            padding: 20px 12px;
        }

        .menu-title {
            color: #68747c;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0 12px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 13px 14px;
            margin-bottom: 5px;
            color: #aeb7bd;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.3s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255, 106, 0, 0.12);
            color: #ff6a00;
        }

        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 17px;
        }

        .logout {
            position: absolute;
            bottom: 20px;
            width: calc(100% - 24px);
            left: 12px;
        }

        .logout a {
            color: #e66a6a !important;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 250px;
            min-height: 100vh;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 75px;
            background: #11171c;
            border-bottom: 1px solid #293239;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 900;
        }

        .mobile-menu {
            display: none;
            font-size: 25px;
            cursor: pointer;
            color: #ff6a00;
        }

        .search {
            width: 400px;
            position: relative;
        }

        .search input {
            width: 100%;
            height: 42px;
            background: #0a0f13;
            border: 1px solid #303a40;
            border-radius: 7px;
            outline: none;
            color: white;
            padding: 0 45px;
        }

        .search input:focus {
            border-color: #ff6a00;
        }

        .search span {
            position: absolute;
            left: 15px;
            top: 12px;
            color: #ff6a00;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .profile-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #ff6a00;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .profile-text strong {
            display: block;
            font-size: 13px;
        }

        .profile-text small {
            color: #6f7a81;
            font-size: 11px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        .welcome {
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 7px;
        }

        .welcome h1 span {
            color: #ff6a00;
        }

        .welcome p {
            color: #78838a;
            font-size: 14px;
        }

        /* ================= STAT CARDS ================= */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #12191e;
            border: 1px solid #293239;
            border-radius: 10px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: 0.3s;
        }

        .stat-card:hover {
            border-color: #ff6a00;
            transform: translateY(-3px);
        }

        .stat-card::after {
            content: "";
            position: absolute;
            right: -25px;
            top: -25px;
            width: 90px;
            height: 90px;
            border: 12px solid rgba(255, 106, 0, 0.06);
            border-radius: 50%;
        }

        .stat-icon {
            font-size: 27px;
            margin-bottom: 12px;
        }

        .stat-card h3 {
            font-size: 25px;
        }

        .stat-card p {
            color: #748087;
            font-size: 12px;
            margin-top: 4px;
        }

        /* ================= SECTION ================= */

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 18px;
        }

        .section-header h2 {
            font-size: 21px;
        }

        .view-all {
            color: #ff6a00;
            text-decoration: none;
            font-size: 13px;
        }

        /* ================= CATEGORY CARDS ================= */

        .categories {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 35px;
        }

        .category {
            background: #12191e;
            border: 1px solid #293239;
            border-radius: 10px;
            padding: 23px;
            text-decoration: none;
            color: white;
            transition: 0.3s;
        }

        .category:hover {
            border-color: #ff6a00;
            transform: translateY(-4px);
        }

        .category-icon {
            font-size: 35px;
            margin-bottom: 13px;
        }

        .category h3 {
            font-size: 17px;
            margin-bottom: 7px;
        }

        .category p {
            color: #78838a;
            font-size: 12px;
            line-height: 1.5;
        }

        /* ================= BOTTOM GRID ================= */

        .bottom-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 20px;
        }

        .panel {
            background: #12191e;
            border: 1px solid #293239;
            border-radius: 10px;
            padding: 22px;
        }

        /* ================= RECENT ITEMS ================= */

        .recent-item {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 0;
            border-bottom: 1px solid #252e34;
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .recent-icon {
            width: 42px;
            height: 42px;
            border-radius: 7px;
            background: rgba(255, 106, 0, 0.09);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 19px;
        }

        .recent-text strong {
            display: block;
            font-size: 13px;
        }

        .recent-text small {
            color: #6e7980;
            font-size: 11px;
        }

        /* ================= QUICK TOOLS ================= */

        .quick-tools {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        .tool {
            background: #0b1014;
            border: 1px solid #293239;
            border-radius: 7px;
            padding: 15px 10px;
            text-align: center;
            color: #aab3b8;
            text-decoration: none;
            font-size: 12px;
            transition: 0.3s;
        }

        .tool:hover {
            color: #ff6a00;
            border-color: #ff6a00;
        }

        .tool div {
            font-size: 24px;
            margin-bottom: 7px;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 1000px) {

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .categories {
                grid-template-columns: 1fr 1fr;
            }

            .bottom-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .sidebar {
                left: -250px;
            }

            .sidebar.open {
                left: 0;
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                padding: 0 15px;
            }

            .mobile-menu {
                display: block;
            }

            .search {
                width: 45%;
            }

            .profile-text {
                display: none;
            }

            .content {
                padding: 20px 15px;
            }

            .welcome h1 {
                font-size: 24px;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
                gap: 10px;
            }

            .categories {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 430px) {

            .stats {
                grid-template-columns: 1fr;
            }

            .search {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- ================= SIDEBAR ================= -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-icon">⚙</div>

            <h2>
                MECHANICAL<br>
                <span>LIBRARY SP</span>
            </h2>

        </div>


        <div class="menu">

            <div class="menu-title">
                Main Menu
            </div>

            <a href="dashboard.html" class="active">
                <span class="menu-icon">🏠</span>
                Dashboard
            </a>

            <a href="library.html">
                <span class="menu-icon">📚</span>
                Mechanical Library
            </a>

            <a href="engine.html">
                <span class="menu-icon">🔧</span>
                Engine
            </a>

            <a href="electrical.html">
                <span class="menu-icon">⚡</span>
                Electrical
            </a>

            <a href="obd-codes.html">
                <span class="menu-icon">📟</span>
                OBD Codes
            </a>

            <a href="tools.html">
                <span class="menu-icon">🧰</span>
                Tools & Equipment
            </a>


            <div class="menu-title" style="margin-top:25px;">
                Account
            </div>

            <a href="profile.html">
                <span class="menu-icon">👤</span>
                My Profile
            </a>

            <a href="settings.html">
                <span class="menu-icon">⚙</span>
                Settings
            </a>

        </div>


        <div class="logout">

            <a href="login.html">
                <span class="menu-icon">🚪</span>
                Logout
            </a>

        </div>

    </aside>


    <!-- ================= MAIN ================= -->

    <main class="main">


        <!-- TOP BAR -->

        <div class="topbar">

            <div
                class="mobile-menu"
                id="mobileMenu"
            >
                ☰
            </div>


            <div class="search">

                <span>🔍</span>

                <input
                    type="search"
                    id="searchBox"
                    placeholder="Search engine, sensor, OBD code..."
                >

            </div>


            <div class="profile">

                <div class="profile-icon">
                    👤
                </div>

                <div class="profile-text">

                    <strong id="userName">
                        Mechanical User
                    </strong>

                    <small>
                        Technician
                    </small>

                </div>

            </div>

        </div>


        <!-- CONTENT -->

        <div class="content">


            <!-- WELCOME -->

            <div class="welcome">

                <h1>
                    Welcome to
                    <span>Mechanical Library SP</span> 🔧
                </h1>

                <p>
                    Your digital workshop for mechanical knowledge,
                    diagnostics and technical information.
                </p>

            </div>


            <!-- STATISTICS -->

            <div class="stats">

                <div class="stat-card">

                    <div class="stat-icon">📚</div>

                    <h3>500+</h3>

                    <p>
                        Technical Articles
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-icon">📟</div>

                    <h3>1000+</h3>

                    <p>
                        OBD Error Codes
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-icon">🔧</div>

                    <h3>250+</h3>

                    <p>
                        Engine Topics
                    </p>

                </div>


                <div class="stat-card">

                    <div class="stat-icon">🧰</div>

                    <h3>150+</h3>

                    <p>
                        Tools Information
                    </p>

                </div>

            </div>


            <!-- CATEGORIES -->

            <div class="section-header">

                <h2>
                    Explore Mechanical Library
                </h2>

                <a
                    href="library.html"
                    class="view-all"
                >
                    View All →
                </a>

            </div>


            <div class="categories">

                <a
                    href="engine.html"
                    class="category"
                >

                    <div class="category-icon">
                        🔧
                    </div>

                    <h3>
                        Engine & Transmission
                    </h3>

                    <p>
                        Engine components, timing, lubrication,
                        cooling, fuel system and transmission.
                    </p>

                </a>


                <a
                    href="electrical.html"
                    class="category"
                >

                    <div class="category-icon">
                        ⚡
                    </div>

                    <h3>
                        Auto Electrical
                    </h3>

                    <p>
                        Sensors, wiring, battery, alternator,
                        starter and electrical diagnosis.
                    </p>

                </a>


                <a
                    href="obd-codes.html"
                    class="category"
                >

                    <div class="category-icon">
                        📟
                    </div>

                    <h3>
                        OBD Diagnostic Codes
                    </h3>

                    <p>
                        DTC codes, symptoms, causes,
                        diagnosis and possible solutions.
                    </p>

                </a>


                <a
                    href="tools.html"
                    class="category"
                >

                    <div class="category-icon">
                        🧰
                    </div>

                    <h3>
                        Tools & Equipment
                    </h3>

                    <p>
                        Workshop tools, measuring instruments
                        and diagnostic equipment.
                    </p>

                </a>


                <a
                    href="notes.html"
                    class="category"
                >

                    <div class="category-icon">
                        📒
                    </div>

                    <h3>
                        Mechanical Notes
                    </h3>

                    <p>
                        Easy mechanical notes for technicians,
                        students and workshop professionals.
                    </p>

                </a>


                <a
                    href="parts.html"
                    class="category"
                >

                    <div class="category-icon">
                        ⚙️
                    </div>

                    <h3>
                        Spare Parts
                    </h3>

                    <p>
                        Parts identification, specifications,
                        functions and applications.
                    </p>

                </a>

            </div>


            <!-- BOTTOM -->

            <div class="bottom-grid">


                <!-- RECENT -->

                <div class="panel">

                    <div class="section-header">

                        <h2>
                            Recent Technical Topics
                        </h2>

                        <a
                            href="library.html"
                            class="view-all"
                        >
                            View All
                        </a>

                    </div>


                    <div class="recent-item">

                        <div class="recent-icon">
                            🔧
                        </div>

                        <div class="recent-text">

                            <strong>
                                CRDI Engine Working
                            </strong>

                            <small>
                                Engine • Recently Added
                            </small>

                        </div>

                    </div>


                    <div class="recent-item">

                        <div class="recent-icon">
                            📟
                        </div>

                        <div class="recent-text">

                            <strong>
                                P0487 Diagnostic Code
                            </strong>

                            <small>
                                OBD • Diagnostic
                            </small>

                        </div>

                    </div>


                    <div class="recent-item">

                        <div class="recent-icon">
                            ⚡
                        </div>

                   
