$(document).ready(function() {

  // -----------------------------------------------------------------------
  // Reset all settings 
  $('.reset-settings').on('click', function(){
      var resetColumns = $(this).attr('data-reset');
      let resetting = confirm("This will re-initialize all boxes and resize/reposition/rearrange them, and CAN NOT BE UNDONE! Are you sure?");
      if (resetting == true) {
        var screenmode = localStorage.getItem('senffsational-mode');
        localStorage.clear();
        location.reload();
        resetAll(resetColumns);
        // We don't want to reset the color mode, though
        if (screenmode == 'dark') {
          $('body').addClass('dark-mode');
          $('#dark-mode').prop("checked", true);
          localStorage.setItem('senffsational-mode','dark');
        } else {
          $('body').removeClass('dark-mode');
          $('#light-mode').prop("checked", true);
        }     
        
      }
  })

  // -----------------------------------------------------------------------
  // On load, check each box to see if it has settings saved in localstorage
  // If yes, retrieve those settings and apply them to that box
  if (typeof(Storage) !== "undefined") {
    setMode();
    setFlow();
    if (localStorage.getItem("senffsational") === null) {
      // None of the boxes have settings saved, reset the whole bunch and save all their settings
      resetAll(0);
    } else {    
      $(".box").each(function(){
        var thisID = $(this).attr('id');
        // check if this box has a value in localstorage
        if (localStorage.getItem(thisID) === null) {
          // This box does NOT have any settings, so do nothing.
        } else {
          const boxProperties = JSON.parse(localStorage.getItem(thisID));
          if ((boxProperties[0] == null) || (boxProperties[1] == null) || (boxProperties[2] == null) || (boxProperties[3] == null) || (boxProperties[4] == null) || (boxProperties[5] == null) || (boxProperties[6] == null)) {
            resetAll(0);
          } else {
            $(this).css('left',boxProperties[0].bleft);
            $(this).css('top',boxProperties[1].btop);
            $(this).css('width',boxProperties[2].bwidth);
            $(this).css('height',boxProperties[3].bheight);
            $(this).css('z-index',boxProperties[4].bzindex);
            $(this).css('display',boxProperties[5].bdisplay);
            $(this).attr('data-status',boxProperties[6].bstatus);
          }            
        }
      });
    }
  }

  // -----------------------------------------------------------------------
  // On load, check which boxes are being shown and list them at the top
  var boxList = '<ul class="box-list">';
  $(".box").each(function(){
    var boxTitle = $(this).find('h2').text();
    var boxID = $(this).attr('id');
    var boxVis = $(this).css('display');
    if ((boxVis) == 'block') {
      var boxChecked = 'checked';
    } else {
      boxChecked = '';
    }
    boxList = boxList + '<li data-box="'+boxID+'"><input type="checkbox" id="'+boxID+'-check" '+boxChecked+'><label for="'+boxID+'-check">'+boxTitle+'</label></li>';
  });
  $('.all-boxes').html(boxList);

  // -----------------------------------------------------------------------
  // Set the Color Mode based on the localStorage (light by default) 
  function setMode() {
      screenmode = localStorage.getItem('senffsational-mode');
      if (screenmode == 'dark') {
        $('body').addClass('dark-mode');
        $('#dark-mode').prop("checked", true);
      } else {
        $('body').removeClass('dark-mode');
        $('#light-mode').prop("checked", true);
      }
  }

  // -----------------------------------------------------------------------
  // Set the Flow Mode based on the localStorage (standard by default) 
  function setFlow() {
    flowmode = localStorage.getItem('senffsational-flow');
    if (flowmode == 'float') {
      $('body').addClass('float-mode');
      $('#float-mode').prop("checked", true);
    } else {
      $('body').removeClass('float-mode');
      $('#move-mode').prop("checked", true);
    }
  }


  // -----------------------------------------------------------------------
  // When a checkbox is deselected, hide the box
  $('body').on('click','.box-list li', function(){
    var whichBox = $(this).attr('data-box');
    if ($(this).find('input').is(":checked")) {
        $('#'+whichBox).show();
    } else {
       $('#'+whichBox).hide();
    }
    var saveBox = $('#'+whichBox);
    saveLS(saveBox);
  });


  // ----------------------------------------------------------------------------
  // When a color mode or flow mode is changed, save the settings in localstorage
  $('input[name="mode"]').change(function() {
    if ($(this).val() == 'light') {
        $('body').removeClass('dark-mode');
        localStorage.removeItem('senffsational-mode');
    }
    else if ($(this).val() == 'dark') {
        $('body').addClass('dark-mode');
        localStorage.setItem('senffsational-mode','dark');
    }
  });

  $('input[name="flow"]').change(function() {
    if ($(this).val() == 'move') {
        $('body').removeClass('float-mode');
        localStorage.removeItem('senffsational-flow');
        boxDragResize();
        //resetAll(0);
    }
    else if ($(this).val() == 'float') {
        $('body').addClass('float-mode');
        localStorage.setItem('senffsational-flow','float');
        boxRemoveDragResize();
    }
  });  

  // -----------------------------------------------------------------------
  // When a box is clicked, make sure that it gets the highest Z-index
  $('.box').on('mousedown',function(){
    // Part one: once you select/click a box, find the highest Z-index on the page
    var lowestZ = 0;
    var highestZ = 100;
    $(".box").each(function(){
      var thisZ = $(this).css('z-index');
      if(thisZ > highestZ) {
        highestZ = thisZ;
      }       
    });

    // Part two: we end up with highestZ being the highest Z index, and we apply that + 1 to the box we clicked
    var applyZ =  parseInt(highestZ) + 1;
    $('.box').removeClass('top');
    $(this).addClass('top').css('z-index',applyZ).attr('data-z',applyZ);
    saveLS($(this));

   // TO DO: REDUCE Z-INDEXES SO THAT WE DON'T END UP WITH RIDICULOUS AMOUNTS

  });

  // -----------------------------------------------------------------------
  // Settings collapsing/opening
  $('#settings-button').click(function(){
    $('#settings').slideDown();
  });

  $('#close-button').click(function(){
    $('#settings').slideUp();
  }); 


  // -----------------------------------------------------------------------
  // Box collapsing/opening
  $( ".box h2" ).prepend("<div class='box-actions'><span class='close'>✕</span> <span class='collapse'>▲</span><span class='show'>▼</span></div>");

  $( ".box h2" ).on('click','.close',function() {
    $(this).parent().parent().parent().css('display','none').attr('data-status','0');
    var saveBox = $(this).parent().parent().parent();
    var boxID = $(this).parent().parent().parent().attr('id');
    $('#'+boxID+'-check').prop('checked', false);
    saveLS(saveBox);
  });

  $( ".box h2" ).on('click','.collapse',function() {
    $(this).parent().parent().parent().addClass('collapsed').attr('data-status','1').resizable('destroy');
    saveLS($(this).parent().parent().parent());
  });

  $( ".box h2" ).on('click','.show',function() {
    $(this).parent().parent().parent().removeClass('collapsed').css('height','auto').attr('data-status','2').resizable();
    var boxID = $(this).parent().parent().parent().attr('id');
    $('#'+boxID+'-check').prop('checked', true);
    saveLS($(this).parent().parent().parent());
  });

  // -----------------------------------------------------------------------
  // Make boxes draggable and resizable
  function boxDragResize() {
    $( ".box" ).draggable({
      grid: [10, 10 ],
      start: function() {},
      drag: function() {},
      stop: function() {
        saveLS($(this));
      }
    }).resizable({
      stop: function() {
        saveLS($(this));
      }
    });
  }

  // -----------------------------------------------------------------------
  // Make boxes normal (for float mode)
  function boxRemoveDragResize() {
    $( ".box" ).draggable('destroy').resizable('destroy');
  }


  // -----------------------------------------------------------------------
  // On load, make boxes draggable and resizable if it's not in float mode
  // The classname comes from the setMode function (which controls the body class)
  // which is triggered on load.
  if (!$('body').hasClass('float-mode')) {
    boxDragResize();
  }

  // -----------------------------------------------------------------------
  // Don't make boxes resizable if they have status 1 (collapsed)
  $('.box[data-status="1"]').resizable('destroy');


  // -----------------------------------------------------------------------
  // Set datepickers
  $( ".datepicker" ).datepicker();


  // -----------------------------------------------------------------------
  // The function that saves all box settings after you select the box, or drag it around, or resize it
  function saveLS(box) {
    boxID = box.attr('id');
    boxLeft = box.css('left');
    boxTop = box.css('top');
    boxWidth = box.css('width');
    boxHeight = box.css('height');
    boxZ = box.css('z-index');
    boxDisplay = box.css('display'); 
    boxStatus = box.attr('data-status'); 
    if ($("#dark-mode").is(":checked")) {
      mode = 'dark';
    } else {
      mode = 'light';
    }

    if (typeof(Storage) !== "undefined") {
      const boxProps = [{'bleft':boxLeft}, {'btop': boxTop}, {'bwidth': boxWidth}, {'bheight': boxHeight}, {'bzindex': boxZ}, {'bdisplay': boxDisplay}, {'bstatus': boxStatus}];
      localStorage.setItem(boxID, JSON.stringify(boxProps));
      // localStorage.setItem('senffsational-mode',mode);
      localStorage.setItem('senffsational','true'); // just to indicate that there are settings
    }
  }

  // -----------------------------------------------------------------------
  // The function that puts all the boxes in the original position and/or
  // puts them in the desired amount of columns
  function resetAll(columns) {
    var cols = parseInt(columns);
    $('.box-list li input').prop('checked', true);
    var screenWidth = $(window).width();
    var boxWidth = 405; // default
    var boxSpace = 15; // don't touch this
    if(cols == 0) {

    } else {
      var spaceNoBoxes = ((cols+1) * boxSpace);
      var spaceForBoxes = (screenWidth - spaceNoBoxes);
      boxWidth = Math.floor(spaceForBoxes / cols);
    }

    var boxCount = 0;
    var initTop = 0;
    var boxPerRow = Math.floor(screenWidth / (boxWidth + boxSpace)); // How many boxes fit on a row
    var boxRow = 0;
    var boxColumn = 0;
    $(".box").each(function(){
      var boxLeftPos = ((boxWidth + boxSpace) * boxColumn) + boxSpace;
      $(this).css('left',boxLeftPos+'px');
      $(this).css('top',initTop+'px');
      $(this).css('width',boxWidth+'px');
      $(this).css('height','auto');
      $(this).css('z-index','100');
      $(this).css('display','block');
      $(this).attr('data-status','2');        
      $(this).attr('data-row',boxRow);
      $(this).attr('data-column',boxColumn);      
      boxColumn++;
      boxCount++;     
      if ((boxColumn) == boxPerRow) {
        // This is the last box on the row. The next should start on a new row.
        // First we'll need to find what the highest box in this current row is.
        var highestBox = 0;
        $(".box[data-row="+boxRow+"]").each(function(){
          var thisBoxHeight = $(this).height();
          $(this).attr('boxheight',thisBoxHeight);
          if(thisBoxHeight > highestBox) {
            highestBox = thisBoxHeight;
          }
        });
        initTop = initTop + highestBox + boxSpace + 5; // adding 5 just to accomodate for some borders, etc.
        initTop = Math.ceil(initTop / 10) * 10; // round up to nearest 10       
        boxColumn = 0;
        boxRow++;
      }     
      saveLS($(this));
    });
  }

  // -----------------------------------------------------------------------
  // Execute search
  $('.box .button').on('click',function(){

    if($(this).hasClass('has-select')) {

      var resultsURL = $(this).parent().attr('data-url');

      inputs = $(this).parent().find('input[type="text"],input[type="date"],textarea').length;
      numfields = inputs + 1;

      for (i = 1; i < numfields; i++) { 
         var j = i+1;
         inputValue = $(this).parent().find('input:nth-of-type('+i+'),textarea:nth-of-type('+i+')').val();
         orgString = '[input-'+j+']';
         resultsURL = resultsURL.replace(orgString, inputValue);
      }

      selector = $(this).parent().find('select').val();
      resultsURL = resultsURL.replace('[input-1]', selector);

      
    } else {

      var resultsURL = $(this).parent().attr('data-url');

      inputs = $(this).parent().find('input[type="text"],input[type="date"],textarea').length;
      numfields = inputs + 1;

      for (i = 1; i < numfields; i++) { 
           inputValue = $(this).parent().find('input:nth-of-type('+i+'),textarea:nth-of-type('+i+')').val();
           orgString = '[input-'+i+']';
           resultsURL = resultsURL.replace(orgString, inputValue);
      }

    }

    var win = window.open(resultsURL, '_blank');
    win.focus();
  
  }); 

  // -----------------------------------------------------------------------
  // Fallback for ENTER key

  $('input[type="text"').bind("enterKey",function(e){
      $(this).parent().find('input[type="submit"]').trigger('click');
  });
  
  $('input[type="text"').keyup(function(e){
    if(e.keyCode == 13) {
        $(this).trigger("enterKey");
    }
  });

});
