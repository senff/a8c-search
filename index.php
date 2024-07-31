<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Senffsational Search Portalpage</title>
  <link rel="shortcut icon" type="image/x-icon" href="images/icon-automattic-2.png" sizes="16x16" />
  <link rel="icon" type="image/x-icon" href="images/icon-automattic-2.png" sizes="16x16" />
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script src="script.js"></script>
  <link rel="stylesheet" href="styles.css">

</head>
<body>

<h1>Senffsational <span>A8C Search</span> Portalpage <span class="beta">BETA VERSION</span></h1>

<button class="button" id="settings-button">SETTINGS</button>

<div id="settings" style="display: none;">
  <button id="close-button">✕</button>
  <div class="inside">
    <h3>Settings</h3>

    <div class="setting general-description">All settings will be saved instantly and will only apply to <strong>this particular browser</strong> on <strong>this particular computer</strong>. <br>Settings can not be transferred to another browser/computer at this time (maybe later).</div>

    <div class="setting setting-boxes"><div class="settings-title">BOXES TO DISPLAY:</div><div class="all-boxes"></div></div>

    <div class="setting setting-mode"><div class="settings-title">COLOR MODE:</div> <input type="radio" name="mode" id="light-mode" value="light"><label for="light-mode">LIGHT MODE</label> <input type="radio" name="mode" id="dark-mode" value="dark"><label for="dark-mode">DARK MODE</label></div>

    <div class="setting setting-flow"><div class="settings-title">BOX ARRANGEMENT:</div> <input type="radio" name="flow" id="move-mode" value="move"><label for="move-mode">STANDARD</label> <input type="radio" name="flow" id="float-mode" value="float"><label for="float-mode">FLEXIBLE</label>

      <div class="float-mode-description"> In <strong>FLEXIBLE</strong> mode, all boxes have a <strong>fixed width</strong> and will be placed after eachother, and their positions adapt to your browser width. Boxes can <strong>not</strong> be dragged or resized, but you can still hide them. </div>
      <div class="reset-setting"><em>In <strong>STANDARD</strong> mode, all boxes can be <strong>dragged</strong> across the screen (and placed wherever you want them) and <strong>resized</strong>, and their individual sizes/positions will not impact any of the other boxes. Since <strong>you</strong> decide where the boxes are placed, resizing your browser will not change their position. <br><br>You can re-initialize/reset all settings/sizes/positions with the RESET buttons:</em> 
      <br> 
      <button class="button reset-settings" data-reset="0" class="button">RESET</button> resets all boxes to a width of 400 pixels <br>
      <button class="button reset-settings" data-reset="3" class="button">3 COLUMNS </button> resets boxes into 3 equal columns (based on current browser width)<br>
      <button class="button reset-settings" data-reset="4" class="button">4 COLUMNS</button> resets boxes into 4 equal columns (based on current browser width)<br>
      <button class="button reset-settings" data-reset="5" class="button">5 COLUMNS</button> resets boxes into 5 equal columns (based on current browser width)<br>
      <button class="button reset-settings" data-reset="6" class="button">6 COLUMNS</button> resets boxes into 6 equal columns (based on current browser width)<br>

      </div>

    </div>
    <p class="setting version">Version: 1.93 / Jul 31, 2024 - <a href="https://github.com/senff/a8c-search" target="_blank">latest version on Github</a></p>
  </div>
</div>

<!-- ================================================================================================================================================= -->


<div class="boxes">

  <div class="box" id="search-support-guides" style="z-index:100;" data-z="100">
    <h2>Search Support Guides</h2>
    <div class="inner">
      <p data-url="https://www.google.ca/search?q=site%3Ahttps%3A%2F%2Fwordpress.com%2Fsupport%2F+[input-1]">
        <input type="text">
        <input type="submit" value="WP.com docs" class="button">
      </p>
      <p data-url="https://wordpress.com/plugins?s=[input-1]">
        <input type="text">
        <input type="submit" value="WP.com plugins" class="button">
      </p>      
      <p data-url="https://www.google.ca/search?q=site%3Ahttps%3A%2F%2Fwoocommerce.com+[input-1]">
        <input type="text">
        <input type="submit" value="Woo.com Docs" class="button woo-button">
      </p>
      <p data-url="https://woocommerce.com/search/?q=[input-1]&collections=product">
        <input type="text">
        <input type="submit" value="Woo Extensions" class="button woo-button">
      </p>      
      <p data-url="https://www.google.ca/search?q=site%3Ahttps%3A%2F%2Fjetpack.com%2Fsupport%2F+[input-1]">
        <input type="text">
        <input type="submit" value="Jetpack" class="button jetpack-button">
      </p>
    </div>
  </div>

  <div class="box" id="search-public-resources" style="z-index:100; left:400px;" data-z="100">
    <h2>Search Public Resources</h2>
      <div class="inner">
        <p data-url="https://www.google.com/search?q=site%3Ahttps%3A%2F%2Fwordpress.com%2Fforums+[input-1]">
          <input type="text">
          <input type="submit" value="Search WP.com forums" class="button">
        </p>
        <p data-url="https://wordpress.org/plugins/search/[input-1]">
          <input type="text">
          <input type="submit" value="Search WP.org Plugin Repo" class="button">
        </p>      
        <p data-url="https://www.google.com/search?q=site%3Ahttps%3A%2F%2Fwordpress.org%2Fsupport%2Fplugin%2Fwoocommerce+[input-1]">
          <input type="text">
          <input type="submit" value="Search Woo forum" class="button woo-button">
        </p>            
      </div>
  </div>

   <div class="box" id="fieldguide" style="z-index:100;" data-z="100">
    <h2>Automattic Field Guide</h2>
    <div class="inner">
      <p data-url="https://fieldguide.automattic.com/?s=[input-1]">
        <input type="text">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>

  <div class="box" id="matts-global-search" style="z-index:100;" data-z="100">
    <h2>Matt's Global Search</h2>
      <div class="inner">
        <div class="fields multiple-fields" data-url="https://mc.a8c.com/mgs/?q=[input-2]&ms=[input-1]">
          <label for="mgs-search">Search for</label><input type="text" id="mgs-search">
          <br style="clear: both;">
          <label for="mgs-source">Where</label>
            <select id="mgs-source">
              <option value="p2" selected>P2s</option>
              <option value="p2_jps">P2 JPS</option>
              <option value="internalDocs">Fieldguide & Internal</option>
              <option value="publicDocs">Public Docs</option>
              <option value="github">Github </option>
              <option value="trello">Trello</option>
              <option value="matticspace">Matticspace</option>
              <option value="mc">Stats</option>
              <option value="slack">Slack</option>
              <option value="irc">IRC</option>
            </select>
          <input type="submit" value="Search" class="button has-select">
        </div>    
      </div>
  </div>


  <div class="box" id="darc" style="z-index:100;" data-z="100">
    <h2>DARC</h2>
    <div class="inner">
      <p class="fields" data-url="https://mc.a8c.com/tools/reportcard/domain/?domain=[input-1]">
        <input type="text" placeholder="domain.com">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>


  <div class="box" id="gsuite" style="z-index:100;" data-z="100">
    <h2>GSuite/GWRC</h2>
    <div class="inner">
      <p class="fields" data-url="https://mc.a8c.com/tools/reportcard/google-apps/?domain=[input-1]">
        <input type="text" placeholder="domain.com">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>

  <div class="box" id="wordads" style="z-index:100;" data-z="100">
    <h2>WordAds</h2>
      <div class="inner">
        <p class="fields" data-url="https://mc.a8c.com/wordads/wordads-report.php?by_user=[input-1]">
          <input type="text" placeholder="username">
          <input type="submit" value="Search" class="button">
        </p>

        <p class="fields" data-url="https://mc.a8c.com/wordads/wordads-detail.php?id=[input-1]">
          <input type="text" placeholder="blog ID">
          <input type="submit" value="Search" class="button">
        </p>
      </div>
  </div>

  <div class="box" id="logstash" style="z-index:100;" data-z="100">
    <h2>LogStash</h2>
      <div class="inner">
        <div class="fields multiple-fields" data-url="https://mc.a8c.com/logstash/?stash=[input-1]&query=[input-2]&from=[input-3]&to=[input-4]">
          <label for="logstash-source">Source</label><select id="logstash-source"><option value="mail">Mail</option><option value="atmail" selected>Atomic Mail</option></select>
          <br style="clear: both;">
          <label for="logstash-query">Query</label><input id="logstash-query" type="text">
          <br style="clear: both;">
          <label for="logstash-from">From</label><input id="logstash-from" type="text" class="datepicker" id="logstash-from" placeholder="mm/dd/yyyy">
          <br style="clear: both;">
          <label for="logstash-to">To</label><input id="logstash-to" type="text" class="datepicker" id="logstash-to" placeholder="mm/dd/yyyy">
          <br style="clear: both;">
          <label for="logstash-submit"></label>
          <input id="logstash-submit" type="submit" value="Search" class="button has-select">
        </div>    
      </div>
  </div>


  <div class="box" id="kibana" style="z-index:100;" data-z="100">
    <h2>Kibana</h2>
    <div class="inner">
      <p class="fields" data-url="https://logstash.a8c.com/kibana6/app/kibana#/discover?_g=()&_a=(columns:!(_source),index:'log2logstash-*',interval:auto,query:(language:lucene,query:'http_host:[input-1]'),sort:!('@timestamp',desc))">
        <input type="text" placeholder="domain.com">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>

  <div class="box" id="coupons" style="z-index:100;" data-z="100">
    <h2>Coupons</h2>
    <div class="inner">
      <p data-url="https://mc.a8c.com/marketing/coupons/?code=[input-1]&page=1&showAll=yes">
        <input type="text">
        <input type="submit" value="WP.com" class="button">
      </p>      
      <p data-url="https://woo.com/wp-admin/edit.php?s=[input-1]&post_status=all&post_type=shop_coupon">
        <input type="text">
        <input type="submit" value="Woo.com" class="button woo-button">
      </p>
    </div>
  </div>

  <div class="box" id="jetpack" style="z-index:100;" data-z="100">
    <h2>Jetpack</h2>
      <div class="inner">
        <p class="fields" data-url="https://jetpack.com/support/debug/?url=[input-1]">
          <input type="text" placeholder="domain.com">
          <input type="submit" value="Debug" class="button jetpack-button">
        </p>

        <p class="fields" data-url="https://mc.a8c.com/site-profiles/?q=[input-1]&xmlrpc_contact_1_week=true">
          <input type="text" placeholder="domain.com">
          <input type="submit" value="Site Search" class="button jetpack-button">
        </p>

        <p class="fields" data-url="https://mc.a8c.com/rewind/debugger.php?site=[input-1]">
          <input type="text" placeholder="site ID">
          <input type="submit" value="Rewind Debugger" class="button jetpack-button">
        </p>      
      </div>
  </div>

  <div class="box" id="university" style="z-index:100;" data-z="100">
    <h2>University Sites</h2>
      <div class="inner">
        <div class="fields multiple-fields" data-url="https://[input-1].wordpress.com/?s=[input-2]">
          <label for="university-site">Site</label>
          <select id="university-site">
            <option value="accountsuniversity">Accounts University</option>
            <option value="atomicuniversity">Atomic University</option>
            <option value="buddyuniversity">Buddy University</option>
            <option value="chaosuniversity">Chaos University</option>
            <option value="csscentral">CSS Central</option>
            <option value="domainsuniversity">Domains University</option>
            <option value="emailuniversity">Email University</option>
            <option value="hcsuniversity">Happiness Contractors</option>
            <option value="mobilesupportuniversity">Mooniversity</option>
            <option value="podcastinguniversity">Podcasting University</option>
            <option value="privacyuniversity">Privacy University</option>
            <option value="qualityuni">Quality University</option>
            <option value="quickstartuniversity">Quick Start University</option>
            <option value="schedulinguniversity">Scheduling University</option>
            <option value="subscriptionsuniversity">Subscriptions University</option>
            <option value="woogleuniversity">Woogle University</option>
            <option value="wooniversity">Wooniversity</option>
            <option value="wordadsuniversity">WordAds University</option>
            <option value="wpcomuniversity">WPcom University</option>
            <option value="zbsuniversity">ZBS University</option></select>
          <br style="clear: both;">
          <label for="university-query">Query</label><input id="university-query" type="text">
          <br style="clear: both;">
          <label for="university-submit"></label>
          <input type="submit" value="Search" id="university-submit" class="button has-select">
        </div>    
      </div>
  </div>


  <div class="box" id="translate" style="z-index:100;" data-z="100">
    <h2>Translate</h2>
    <div class="inner">
      <p class="fields" data-url="https://translate.google.com/#auto/en/[input-1]">
        <textarea placeholder="¿Que?"></textarea>
        <input type="submit" value="Translate" class="button">
      </p>
    </div>
  </div>


  <div class="box" id="network-admin" style="z-index:100;" data-z="100">
    <h2>Network Admin</h2>
    <div class="inner">

      <a href="https://wordpress.com/wp-admin/network/user-new.php" target="_blank">Create new user</a>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/users.php?s=[input-1]">
        <input type="text">
        <input type="submit" value="Users" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/site-info.php?id=[input-1]">
        <input type="text" placeholder="blog ID">
        <input type="submit" placeholder="Blog ID" value="Search site by Blog ID" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/sites.php?s=[input-1]">
        <input type="text" placeholder="domain.com">
        <input type="submit" value="Search site by domain" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/users.php?apikey=[input-1]&submit=Search+API+Keys">
        <input type="text">
        <input type="submit" value="API Keys" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-signups.php?s=[input-1]&submit=Search+Signups">
        <input type="text">
        <input type="submit" value="Signups" class="button">
      </p>

      <h4>Search site subscriptions</h4>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/admin.php?page=subscriptions&subs_user=[input-1]">
        <input type="text" placeholder="Username, email or user ID">
        <input type="submit" value="By User" class="button">
      </p>

      <h4>Search Upgrades/Credits</h4>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=search&username=[input-1]&submit=Search+Upgrades%2FCredits+by+User">
        <input type="text">
        <input type="submit" value="By User" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=txn_id_search&paypal_txn_id=[input-1]&submit=Search+Upgrades%2FCredits+by+Payment+Provider+Transaction+ID">
        <input type="text">
        <input type="submit" value="By Payment Provider Transaction ID" class="button">
      </p>

    </div>
  </div>

  <div class="box" id="store-admin" style="z-index:100;" data-z="100">
    <h2>Store Admin / Transaction Search</h2>
    <div class="inner">

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=search&username=[input-1]">
        <input type="text">
        <input type="submit" value="Users" class="button">
      </p>

      <h4>Paypal User Search</h4>
      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=paypal_user_search&paypal_email=[input-1]">
        <input type="text" placeholder="user@domain.com">
        <input type="submit" value="Search" class="button">
      </p>

      <h4>Transaction Search</h4>
      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=txn_id_search&paypal_txn_id=[input-1]">
        <input type="text">
        <input type="submit" value="Search Transaction ID" class="button">
      </p>

      <h4>Blog Search</h4>
      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=blog_id_search&id=[input-1]">
        <label for="blog-search">ID</label>
        <input type="text" id="blog-search" placeholder="1234567">
        <input type="submit" value="Search" class="button">
      </p>

      <p class="fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=blog_id_search&id=[input-1]">
        <label for="blog-url">URL</label>
        <input type="text" id="blog-url" placeholder="mycoolsite.wordpress.com">
        <input type="submit" value="Search" class="button">
      </p>

      <h4>Mystery Transaction</h4>
      <p class="fields multiple-fields" data-url="https://wordpress.com/wp-admin/network/wpcom-paid-upgrades.php?action=mystery_trans_search&date=[input-1]&name=[input-2]">
        <label for="mystery-date">Date</label>
        <input type="text" id="mystery-date" class="datepicker" placeholder="yyyy/mm/dd">
        <br style="clear:both;">
        <label for="mystery-name">Name</label>
        <input type="text" id="mystery-name">
        <br style="clear:both;">
        <label for="mystery-submit"></label>
        <input type="submit" id="mystery-submit" value="Search" class="button">
        <br>(searches in 10-day range)
      </p>

    </div>
  </div>

  <div class="box" id="woo" style="z-index:100;" data-z="100">
    <h2>WooCommerce</h2>
      <div class="inner">
        <p class="fields" data-url="https://woocommerce.com/wp-admin/users.php?s=[input-1]">
          <input type="text" placeholder="Woo username or email">
          <input type="submit" value="Woo user list" class="button woo-button">
        </p>

        <p class="fields" data-url="https://woocommerce.com/wp-admin/?wpcom_user_id=[input-1]">
          <input type="text" placeholder="WordPress.com user ID, e.g. 12345678">
          <input type="submit" value="Woo profile" class="button woo-button">
        </p>

        <p class="fields" data-url="https://woocommerce.com/wp-admin/user-edit.php?user_id=[input-1]">
          <input type="text" placeholder="WooCommerce.com user ID, e.g. 1234567 ">
          <input type="submit" value="Woo profile" class="button woo-button">
        </p>    

        <p class="fields" data-url="https://woocommerce.com/wp-admin/?go_to_order=1&order_number=[input-1]">
          <input type="text" placeholder="Order ID, e.g. 510230676">
          <input type="submit" value="Order" class="button woo-button">
        </p>             
      </div>
  </div>

  <div class="box" id="woopayments" style="z-index:100;" data-z="100">
    <h2>WooPayments</h2>
    <div class="inner">
      <p class="fields" data-url="https://mc.a8c.com/woocommerce-payments/account.php?account_id=[input-1]">
        <input type="text" placeholder="Blog ID, Stripe account ID, or email">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>


  <div class="box" id="sales" style="z-index:100;" data-z="100">
    <h2>Sales: Site Analytics</h2>
      <div class="inner">
        <p class="fields" data-url="https://www.similarweb.com/website/[input-1]/#overview">
          <input type="text" placeholder="domain.com">
          <input type="submit" value="Similarweb" class="button">
        </p>

        <p class="fields" data-url="https://moz.com/domain-analysis?site=[input-1]">
          <input type="text" placeholder="domain.com">
          <input type="submit" value="Moz.com SEO" class="button">
        </p>

        <p class="fields" data-url="https://looker.a8c.com/dashboards/728?Normalized+URL=[input-1]">
          <input type="text" placeholder="domain.com">
          <input type="submit" value="Looker" class="button">
        </p>    
            
      </div>
  </div>

  <div class="box" id="mailpoet" style="z-index:100;" data-z="100">
    <h2>MailPoet</h2>
    <div class="inner">
      <p class="fields" data-url="https://account.mailpoet.com/admin/users?q=[input-1]">
        <input type="text" placeholder="Email, name, key.....">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>

  <div class="box" id="payments" style="z-index:100;" data-z="100">
    <h2>Payments Admin</h2>
    <div class="inner">
      <p class="fields" data-url="https://mc.a8c.com/payments-admin/search.php?search=[input-1]">
        <input type="text" placeholder="Email, username, user ID, receipt ID, etc.">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>


  <div class="box" id="blaze" style="z-index:100;" data-z="100">
    <h2>Blaze</h2>
    <div class="inner">
      <p class="fields" data-url="https://adpurchase.wordpress.com/wp-admin/edit.php?s=[input-1]&post_status=all&post_type=shop_subscription&action=-1&m=0&_wcs_product&_payment_method&_customer_user&paged=1&action2=-1">
        <input type="text" placeholder="Email address">
        <input type="submit" value="Search" class="button">
      </p>
    </div>
  </div>

</div>

<!-- ================================================================================================================================================= -->

</body>

</html>
