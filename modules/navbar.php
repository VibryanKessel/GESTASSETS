
<?php include "icon/addicon.php"; ?>

<style type="text/css">
    @media only screen and (min-width: 767px)
{
    #logo-entete
    {
        display: none;
        visibility: hidden;
    }
}
@media only screen and (max-width: 767px)
{
    #logo-entete
    {
        display: block;
    }
}

.nav-icon-in
{
  border-top: 1px solid gray;
    display: inline-block;
  width: 1.5em;
  height: .05em;
  vertical-align: middle;
  background-repeat: no-repeat;
  background-position: center;
  background-size: 100%;
}
.navbar-toggler-icon
{
      border-top: 1px solid gray;
  border-bottom: 1px solid gray;
}
nav
{
    background-color: transparent ;
    height: 20vh; 
    /*box-shadow: 5px 2px 5px 1px rgba(0,0,0,.5);*/
    z-index: 100;

    /*visibility: hidden;*/
}

ul
{
    height: 100vh;
    display: flex;
    position: absolute;
    left: 0;
    top: 0;
    flex-wrap: wrap;
    /*flex-direction: column;*/
    list-style-type: none;
    font-family: verdana;
}
.li:hover a{
    background-color: transparent;
    color: #E91E63;
}
li
{
    background-color: transparent;
    width: 100%;
    height: 20%;
    font-size: 3em;
    transition: .3s transform;
    color: #E91E63;
}
ul:hover
{
}
.li:hover
{
    cursor: pointer;
    transform: scaleY(1.07);
    /*background: transparent;*/
}
.nav
{
    height: 100vh;
    position: absolute;
    left: 0;
    top: 0;
    width: 15vw;
    margin-left:0;
}
.navint
{
    position: absolute;
    left: 0;
    top: 0;
}
/*a
{
    font-family: arial black;
    cursor: pointer;
    font-size: 2.7vw;
    color: #E91E63;
    text-shadow: .5px 1px 2px black;
}
.entree:hover span,.asset:hover span,.user:hover span
{
    background: rgba(255,255,255,.2);
    border-radius: 1vh;
}
.entree
{
    background-color :#E91E63;
    background-clip:text;
    -webkit-background-clip:text;
    color:transparent;
    position: absolute;
    border-radius: 2px;
    font-family: arial black;
        z-index: 1;
}
.asset
{
    background-color: #E91E63;
    background-clip:text;
    -webkit-background-clip:text;
    color:transparent;
    font-family: arial black;
    border-radius: 2px; 
        z-index: 1;
}
.user
{
    background-color:#E91E63 ;
    background-clip:text;
    -webkit-background-clip:text;
    color:transparent;
    font-family: arial black;
    position: absolute;
    border-radius: 2px;
        z-index: 1;
}
.entree:hover span i,.asset:hover span i,.user:hover span i
{
    background: rgba(255,255,255,.4);
    border-radius: 100%;
    height: 3vw;
    width: 3vw;
}
*/
</style>

  <nav class="nav navbar navbar-expand-md">
    <div class="container-fluid">
    <div class="fixed-top float-end fw-bold w-100 d-flex" id="logo-entete"><p style="color: pink">IN</p><p>TELCIA</p></div>
      <button class="navbar-toggler fixed-top float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation"> 
      <span class="navbar-toggler-icon">
          <span class="nav-icon-in"></span>
      </span>
    </button>
    <div class="navint collapse navbar-collapse vh-100"  id="navbarNavDropdown">
        <ul class="navbar-nav row-15">
            <li class="li row-3 nav-item " title="Operation sur un asset" onclick="window.location.assign('accueil.php')">
                <center>
                <i class="fa fa-arrow-circle-down fa-2x" aria-hidden="true"></i>
                <a class="entree nav-link active" aria-current="page" href="accueil.php"><span>ENTREES</span></a>
                </center>
            </li>
            <li class="li row-3 nav-item" title="Liste des  assets" onclick="window.location.assign('assets.php')">
                <center>    
                <i class="fa fa-wrench fa-2x" aria-hidden="true" ></i>
                <a class="asset nav-link" href="assets.php"><span>MATERIEL</span></a>
                </center>
            </li>
            <li class="li row-3 nav-item" title="Gerer Vos Types d' Assets" onclick="window.location.assign('etats.php')">
                <center>    
                <i class="fa fa-file-text fa-2x" aria-hidden="true"></i>
                <a class="asset nav-link" href="etats.php"><span>ETATS </span></a>
                </center>
            </li>
            <li class="li row-3 nav-item" title="Gerer les utilisateurs" onclick="window.location.assign('users.php')">
                <center>   
                    <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                    <a class="user nav-link" href="users.php"><span>USERS</span></a>
                </center>
            </li>

            <li class=" nav-item  container  row-3" title="parametres">
                <br>
            <?php require"deconnexion/deconnexion.php";?>
            </li>
        </ul>
    </div>
    </div>
  </nav>

    <br>