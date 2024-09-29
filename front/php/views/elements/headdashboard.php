
<head>
	<meta charset="UTF-8">
	<meta name="language" content="en">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<title>Dashboard</title>


	<style>
@import url('bootstrap.min.css');
@import url('all.min.css');
@import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap');
		:root {
	--theme-color: rgb(239, 71, 73);
	--dark-gray: #585858;
	--border-color: #ddd;
	--nav-size: 75px;
}


body {
	background: #FAFAFA;
}

.custom-nav {
	background: #fff;
	height: var(--nav-size);
}

.user-prfile img{
	--size: 35px;
	width: var(--size);
	height: var(--size);
	border-radius: 50%;
	object-fit: cover;

}


.bell-icon-badge {
	font-size: 25px;
    position: relative;
}

.bell-icon-badge .bell-badge {
    background: #00C91F;
    color: #fff;
    border-radius: 50%;
    --size: 17px;
    width: var(--size);
    height: var(--size);
    line-height: var(--size);
    font-size: 10px;
    position: absolute;
    left: 22px;
    text-align: center;
}

.navbar-light .navbar-brand {
    color: var(--theme-color);
    font-weight: bold;
}

#sidebar {
	border-right: 1px solid var(--border-color);
	height: calc(100vh - var(--nav-size))
}
#sidebar {
	padding-top: 30px;
}
#sidebar .sidebar-menu {
	list-style: none;
	padding: 0;

}

#sidebar .sidebar-menu li a {
	color: var(--dark-gray);
    display: block;
    padding: 9px 0;
    font-size: 14px;
    text-decoration: none;
     transition: all .4s;
}
#sidebar .sidebar-menu li a i {
	margin-right: 13px;
	font-size: 17px;
}

.btn-warning {
	color: #fff;
}

.btn.btn-theme {
	background: var(--theme-color);
	color: #fff;
	--padding: 25px;
	padding-left: var(--padding);
	padding-right: var(--padding);
}
.btn.btn-theme:hover {
	background: 
    /* Make a bit darker */
    linear-gradient(
      to top,
      rgba(0, 0, 0, 0.25),
      rgba(0, 0, 0, 0.25)
    )
    var(--theme-color);
}

.dash-card {
	background: #fff;
    padding: 20px;
    text-align: center;
    box-shadow: 0 0 4px #00000012;
    border-radius: 3px;
    transition: transform .2s ease;
}
.md-card {
	background: #fff;
    padding: 10px;
    box-shadow: 0 0 4px #00000012;
}

.dash-card:hover {
	transform: translateY(-10px);
}

.dash-card .fa {
	font-size: 50px;
    color: var(--dark-gray);
}

.dash-card p {
	color: var(--dark-gray);
	margin-top: 1rem;
}
.dash-card .btn {
	margin-top: 20px;
}

.dash-card h1 {
	font-weight: 300;
}

.title {
	padding-bottom: 15px;
	color: var(--dark-gray);
}
.spacethis {
	padding-top: 30px;
}

.dash-card{
	color: #00C91F;
}
sub {
	bottom: 0;
	font-size: 60%;
}

.table.no-border td {
	border:none;
}

.table.no-border th {
	border-top: none;
}

.table-user {
	--size: 30px;
	width: var(--size);
	height: var(--size);
	object-fit: cover;
	border-radius: 50%;
	margin-right: 5px;
}
.map-img {
	width: 100%;
    height: 286px;
    object-fit: cover;
}

.search-form {
	margin-left: 162px;
	position: relative;

}
.search-form .form-control {
	border:none;
	outline: 0;
}
.search-form .form-control:focus {
	outline: none;
	box-shadow: none;
}
.search-form .fa {
	font-size: 20px;
}

#sidebar .sidebar-menu li a:hover ,#sidebar .sidebar-menu li a.active{
	color: var(--theme-color);
}

	</style>
    <link rel="stylesheet" href="css/style.css">
	
</head>