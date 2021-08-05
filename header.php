

<header id="header">
  <div class="header-image imagefill-parent show-imagefill">
    <div class="imagefill-wrapper">
      <!-- style="height: 230px; width: 1199.39px; left: -315px; top: 0px" -->
<!-- 180 auto -->
<!-- 178 1440 original -->

      <img
        src=<?php echo $img_source; ?>
        alt=""
        style="height: 165px; width: auto; left: -315px; top: 0px"
      />
    </div>
  </div>
  <div class="header-wrapper">
    <div class="wrap">
      <h1 class="logo">
        <a href="index.php">
          <img
            src="images/Logo.svg"
            alt="My friend can do"
            width="140"
            height="140"
            border="0"
          />
        </a>
      </h1>
      <div class="home-link">
        <a href="posts.php">MY FRIEND CAN DO</a>
      </div>
      <section class="header-content row">
<!-- если подключать бутстрап, то сдвигается поле поиска -->
        <div
          class="col-10 col-offset-10 header-search mob-nav"
          data-panel="menu"
        >
        <!-- 12-7 -->
        <!-- 6-13 -->
        <!-- <div
          class="col-8 col-offset-4 header-search mob-nav"
          data-panel="menu"
        > -->
          <div
            class="field-wrapper field-wrapper-small header-search-wrapper"
          >
          <form method="get" action="/search">
            <label class="_sr-only" for="header-search-field"
              >Search</label
            >
            <span
              class="twitter-typeahead"
              style="
                position: relative;
                display: inline-block;
                direction: ltr;
              "
            >
              <!-- placeholder="What are you looking for?"   -->
              <!-- <input class="header-search-field" type="text" /> -->
              <input
                id="header-search-field tt-hint"
                class="header-search-field"
                type="text"
                name="q"
                style="
                  position: absolute;
                  top: 0px;
                  left: 0px;
                  border-color: transparent;
                  box-shadow: none;
                  opacity: 1;
                  background: rgb(255, 255, 255) none repeat scroll 0%
                    0%;
                "
              />
              <input
                id="header-search-field"
                class="header-search-field tt-input"
                type="text"
                name="q"
                placeholder="What are you looking for?"
                style="
                  position: relative;
                  vertical-align: top;
                  background-color: transparent;
                "
                dir="auto"
              />
              <span
                class="tt-dropdown-menu"
                style="
                  position: absolute;
                  top: 100%;
                  left: 0px;
                  z-index: 100;
                  display: none;
                  right: auto;
                "
              >
                <div class="tt-dataset-0"></div>
              </span>
            </span>
            <input
              class="ir-ico i-search"
              type="submit"
              value="search"
            />
          </form>

          </div>
        </div>
        <div class="medpro-signin">
          <div class="medpro-user">
            <ul>
              <!-- <li>
                <a class="signin-link" href="signin.php">Sign in</a>
              </li> -->

              <!-- navigation login or logout  -->
              <?php
              if (isset($_SESSION['role_id'])) {

              ?>
              <li>
                <!-- <a id = "logout_link" href="signin.php">Logout</a> -->
                <a id = "logout_link" href="signin.php">Logout</a>
              </li>
              <?php
              if ($_SESSION['role_id']==1) {
              ?>
              <li>
                <a href="modify_user.php">Admin panel</a>
              </li>
              <?php
            } else {?>
              <li>
                <a href="profile.php">My profile</a>
              </li>
              <?php
            }?>
              <?php
            } else {?>
              <li>
                <a class="signin-link" href="signin.php">Sign in</a>
              </li>

              <li>
                <a class="signin-link" href="register.php">Register</a>
              </li>
              <?php
              }
              ?>
            </ul>
          </div>
        </div>
      </section>
    </div>
  </div>
</header>
