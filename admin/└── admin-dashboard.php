<?php
session_start();

/*
    Temporary admin protection.
    Backend authentication connect होने के बाद
    इसे proper database/session authentication से replace करेंगे.
*/

if (!isset($_SESSION['admin_logged_in'])) {
    $_SESSION['admin_logged_in'] = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Admin Dashboard | Mechanical Library SP</title>

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #080c0f;
            color: #fff;
        }

        /* HEADER */

        header {
            height: 70px;
            background: #11171c;
            border-bottom: 2px solid #ff6a00;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 5%;

            position: sticky;
            top: 0;
            z-index: 100;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .gear {
            font-size: 32px;
            color: #ff6a00;
        }

        .brand h1 {
            font-size: 16px;
            line-height: 1.1;
        }

        .brand span {
            color: #ff6a00;
        }

        .admin-label {
            color: #ff6a00;
            font-size: 11px;
            border: 1px solid #ff6a00;
            padding: 7px 11px;
            border-radius: 5px;
        }

        /* LAYOUT */

        .layout {
            display: flex;
            min-height: calc(100vh - 70px);
        }

        /* SIDEBAR */

        .sidebar {
            width: 245px;
            background: #0e1418;
            border-right: 1px solid #293239;
            padding: 22px 15px;
        }

        .sidebar-title {
            color: #66727a;
            font-size: 10px;
            letter-spacing: 1px;
            margin: 8px 12px 12px;
        }

        .menu {
            display: block;
            width: 100%;

            background: transparent;
            border: 1px solid transparent;

            color: #929da3;

            padding: 12px;
            margin-bottom: 5px;

            text-align: left;
            border-radius: 6px;

            cursor: pointer;
            font-size: 12px;

            transition: .3s;
        }

        .menu:hover,
        .menu.active {
            background: rgba(255,106,0,.08);
            color: #ff6a00;
            border-color: rgba(255,106,0,.2);
        }

        .logout {
            margin-top: 30px;
            color: #ff5555;
        }

        .logout:hover {
            color: #ff7777;
            border-color: #ff5555;
            background: rgba(255,0,0,.05);
        }

        /* MAIN */

        .main {
            flex: 1;
            padding: 30px;
            overflow: hidden;
        }

        .welcome {
            margin-bottom: 28px;
        }

        .welcome h2 {
            font-size: 28px;
            margin-bottom: 7px;
        }

        .welcome h2 span {
            color: #ff6a00;
        }

        .welcome p {
            color: #707b82;
            font-size: 12px;
        }

        /* STATS */

        .stats {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(180px, 1fr));

            gap: 15px;
            margin-bottom: 30px;
        }

        .stat {
            background: #12191e;
            border: 1px solid #293239;
            border-radius: 9px;
            padding: 20px;
            transition: .3s;
        }

        .stat:hover {
            border-color: #ff6a00;
            transform: translateY(-3px);
        }

        .stat-icon {
            font-size: 25px;
            margin-bottom: 12px;
        }

        .stat h3 {
            font-size: 26px;
            margin-bottom: 5px;
        }

        .stat p {
            color: #707b82;
            font-size: 11px;
        }

        /* CONTENT */

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-bottom: 18px;
        }

        .section-header h3 {
            font-size: 19px;
        }

        .section-header span {
            color: #ff6a00;
        }

        .add-btn {
            background: #ff6a00;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 11px;
            font-weight: bold;
        }

        .add-btn:hover {
            background: #ff7b20;
        }

        /* TABLE */

        .table-box {
            width: 100%;
            overflow-x: auto;
            background: #11181d;
            border: 1px solid #293239;
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            color: #ff6a00;
            font-size: 10px;
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #293239;
        }

        td {
            color: #929da3;
            font-size: 11px;
            padding: 14px;
            border-bottom: 1px solid #20282d;
        }

        tr:last-child td {
            border-bottom: none;
        }

        .status {
            display: inline-block;
            padding: 5px 8px;
            border-radius: 4px;
            font-size: 9px;
        }

        .active-status {
            background: rgba(0,200,100,.1);
            color: #48d98a;
        }

        .pending-status {
            background: rgba(255,180,0,.1);
            color: #ffbd3c;
        }

        .action {
            background: transparent;
            border: 1px solid #374148;
            color: #aaa;
            padding: 6px 9px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 9px;
        }

        .action:hover {
            border-color: #ff6a00;
            color: #ff6a00;
        }

        /* CARDS */

        .management-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));

            gap: 15px;
        }

        .manage-card {
            background: #12191e;
            border: 1px solid #293239;
            border-radius: 8px;
            padding: 20px;
        }

        .manage-card:hover {
            border-color: #ff6a00;
        }

        .manage-card .icon {
            font-size: 28px;
            margin-bottom: 12px;
        }

        .manage-card h4 {
            margin-bottom: 7px;
        }

        .manage-card p {
            color: #707b82;
            font-size: 11px;
            line-height: 1.6;
        }

        /* MOBILE */

        @media(max-width: 750px) {

            .sidebar {
                width: 65px;
                padding: 15px 7px;
            }

            .sidebar-title {
                display: none;
            }

            .menu {
                text-align: center;
                padding: 13px 5px;
                font-size: 0;
            }

            .menu::first-letter {
                font-size: 18px;
            }

            .main {
                padding: 20px 15px;
            }

            .admin-label {
                display: none;
            }

            .brand h1 {
                font-size: 13px;
            }

        }

    </style>

</head>


<body>


<!-- HEADER -->

<header>

    <div class="brand">

        <div class="gear">⚙</div>

        <h1>
            MECHANICAL<br>
            <span>LIBRARY SP</span>
        </h1>

    </div>

    <div class="admin-label">
        🔐 ADMIN PANEL
    </div>

</header>


<div class="layout">


    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="sidebar-title">
            ADMIN MENU
        </div>


        <button
            class="menu active"
            onclick="showSection('dashboard', this)"
        >
            📊 Dashboard
        </button>


        <button
            class="menu"
            onclick="showSection('users', this)"
        >
            👥 Users
        </button>


        <button
            class="menu"
            onclick="showSection('parts', this)"
        >
            🔩 Spare Parts
        </button>


        <button
            class="menu"
            onclick="showSection('obd', this)"
        >
            🚗 OBD Codes
        </button>


        <button
            class="menu"
            onclick="showSection('tools', this)"
        >
            🛠️ Tools
        </button>


        <button
            class="menu"
            onclick="showSection('library', this)"
        >
            📚 Library
        </button>


        <button
            class="menu"
            onclick="showSection('settings', this)"
        >
            ⚙️ Settings
        </button>


        <button
            class="menu logout"
            onclick="logout()"
        >
            🚪 Logout
        </button>

    </aside>


    <!-- MAIN -->

    <main class="main">


        <!-- DASHBOARD -->

        <section
            id="dashboard"
            class="content-section active"
        >

            <div class="welcome">

                <h2>
                    Admin <span>Dashboard</span>
                </h2>

                <p>
                    Mechanical Library SP management control panel
                </p>

            </div>


            <div class="stats">

                <div class="stat">

                    <div class="stat-icon">
                        👥
                    </div>

                    <h3>128</h3>

                    <p>
                        Registered Users
                    </p>

                </div>


                <div class="stat">

                    <div class="stat-icon">
                        🔩
                    </div>

                    <h3>245</h3>

                    <p>
                        Spare Parts
                    </p>

                </div>


                <div class="stat">

                    <div class="stat-icon">
                        🚗
                    </div>

                    <h3>516</h3>

                    <p>
                        OBD Codes
                    </p>

                </div>


                <div class="stat">

                    <div class="stat-icon">
                        🛠️
                    </div>

                    <h3>42</h3>

                    <p>
                        Mechanical Tools
                    </p>

                </div>

            </div>


            <div class="section-header">

                <h3>
                    Quick <span>Management</span>
                </h3>

            </div>


            <div class="management-grid">


                <div class="manage-card">

                    <div class="icon">
                        👥
                    </div>

                    <h4>
                        User Management
                    </h4>

                    <p>
                        Users ko manage karein,
                        accounts check karein aur
                        access control karein.
                    </p>

                </div>


                <div class="manage-card">

                    <div class="icon">
                        🔩
                    </div>

                    <h4>
                        Parts Management
                    </h4>

                    <p>
                        Spare parts add, edit aur
                        remove karne ke liye.
                    </p>

                </div>


                <div class="manage-card">

                    <div class="icon">
                        🚗
                    </div>

                    <h4>
                        OBD Management
                    </h4>

                    <p>
                        Diagnostic codes aur
                        troubleshooting information manage karein.
                    </p>

                </div>


                <div class="manage-card">

                    <div class="icon">
                        📚
                    </div>

                    <h4>
                        Library Management
                    </h4>

                    <p>
                        Mechanical learning material
                        manage karein.
                    </p>

                </div>


            </div>

        </section>


        <!-- USERS -->

        <section
            id="users"
            class="content-section"
        >

            <div class="section-header">

                <h3>
                    User <span>Management</span>
                </h3>

                <button
                    class="add-btn"
                    onclick="alert('Add User module backend se connect hoga.')"
                >
                    + ADD USER
                </button>

            </div>


            <div class="table-box">

                <table>

                    <thead>

                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <tr>
                            <td>001</td>
                            <td>Demo User</td>
                            <td>user@example.com</td>
                            <td>
                                <span class="status active-status">
                                    ACTIVE
                                </span>
                            </td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('User details')"
                                >
                                    VIEW
                                </button>
                            </td>
                        </tr>


                        <tr>
                            <td>002</td>
                            <td>Mechanical User</td>
                            <td>mechanic@example.com</td>
                            <td>
                                <span class="status active-status">
                                    ACTIVE
                                </span>
                            </td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('User details')"
                                >
                                    VIEW
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- PARTS -->

        <section
            id="parts"
            class="content-section"
        >

            <div class="section-header">

                <h3>
                    Spare <span>Parts</span>
                </h3>

                <button
                    class="add-btn"
                    onclick="alert('Add Parts module backend se connect hoga.')"
                >
                    + ADD PART
                </button>

            </div>


            <div class="table-box">

                <table>

                    <thead>

                        <tr>
                            <th>CODE</th>
                            <th>PART NAME</th>
                            <th>CATEGORY</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <tr>
                            <td>ENG-001</td>
                            <td>Piston</td>
                            <td>Engine</td>
                            <td>
                                <span class="status active-status">
                                    ACTIVE
                                </span>
                            </td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('Edit Piston')"
                                >
                                    EDIT
                                </button>
                            </td>
                        </tr>


                        <tr>
                            <td>FUL-001</td>
                            <td>Fuel Injector</td>
                            <td>Fuel System</td>
                            <td>
                                <span class="status active-status">
                                    ACTIVE
                                </span>
                            </td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('Edit Injector')"
                                >
                                    EDIT
                                </button>
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- OBD -->

        <section
            id="obd"
            class="content-section"
        >

            <div class="section-header">

                <h3>
                    OBD <span>Codes</span>
                </h3>

                <button
                    class="add-btn"
                    onclick="alert('Add OBD module backend se connect hoga.')"
                >
                    + ADD CODE
                </button>

            </div>


            <div class="table-box">

                <table>

                    <thead>

                        <tr>
                            <th>CODE</th>
                            <th>SYSTEM</th>
                            <th>DESCRIPTION</th>
                            <th>ACTION</th>
                        </tr>

                    </thead>


                    <tbody>

                        <tr>
                            <td>P0487</td>
                            <td>EGR / Air System</td>
                            <td>Diagnostic Trouble Code</td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('Edit OBD Code')"
                                >
                                    EDIT
                                </button>
                            </td>
                        </tr>


                        <tr>
                            <td>P0036</td>
                            <td>Electrical</td>
                            <td>HO2S Heater Control</td>
                            <td>
                                <button
                                    class="action"
                                    onclick="alert('Edit OBD Code')"
                                >
                                    EDIT
                                </button>
                            </td>
      
