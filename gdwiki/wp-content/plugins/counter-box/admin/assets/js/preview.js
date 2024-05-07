/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     d@dayes.dev
==================================================== */

'use strict';

(function($) {

  let content = jQuery('#counterBoxContent').val();
  previewContent(content);

  $('#postoptions').on('change', function() {
    builder();
  });

  $('#postoptions').on('keyup', function() {
    builder();
  });

  $('.wp-color-picker-field').wpColorPicker(
      'option',
      'change',
      function(event, ui) {
        builder();
      },
  );

  function previewContent(content) {
    content = content.replace('{day}', '<span class="counter-element -day">10</span>');
    content = content.replace('{hour}', '<span class="counter-element -hour">59</span>');
    content = content.replace('{min}', '<span class="counter-element -min">59</span>');
    content = content.replace('{sec}', '<span class="counter-element -sec">59</span>');
    let start = $('#start').val();
    content = content.replace('{counter}', '<span class="counter-element -counter">' + start + '</span>');
    $('.counter-box').html(content);
    builder();
  }

  function builder() {
    let box = $('.counter-element');
    box.removeAttr('style');

    let widthUnit = $('#widthUnit').val().toString();
    let width = $('#width').val();

    if (widthUnit === 'auto') {
      box.css('width', 'auto');
    } else {
      box.css('width', width + 'px');
    }

    let heightUnit = $('#heightUnit').val().toString();
    let height = $('#height').val();
    if (heightUnit === 'auto') {
      box.css('height', 'auto');
    } else {
      box.css({
          'height': height + 'px',
          'line-height': height + 'px',
      });
    }
    let background = $('#background').val();
    let border_radius = $('#border_radius').val();
    let border_style = $('#border_style').val();
    let border_width = $('#border_width').val();
    let border_color = $('#border_color').val();

    box.css({
      'border-width': border_width + 'px',
      'border-style': border_style,
      'border-color': border_color,
      'background': background,
    });

    if (border_radius !== 0) {
      box.css({
        'border-radius': border_radius + 'px',
      });
    }

    buildStyle();
  }

  $('#counterBoxContent').on('keydown', function() {
    builder();
  });

  function buildStyle() {
    $('#counter-builder').remove();
    let day = $("#day_title_checkbox").prop('checked') ? $('#day_title').val() : '';
    let hour = $("#hour_title_checkbox").prop('checked') ? $('#hour_title').val() : '';
    let min = $("#min_title_checkbox").prop('checked') ? $('#min_title').val() : '';
    let sec = $("#sec_title_checkbox").prop('checked') ? $('#sec_title').val() : '';
    let counter = $("#counter_title_checkbox").prop('checked') ? $('#counter_title').val() : '';
    let location = $("#title_position").val() || 'top';
    let offset = $("#title_offset").val() || 0;
    let color = $("#title_color").val() || '#000000';
    let size = $("#title_size").val() || '12';

    $(`<style id='counter-builder' type='text/css'> 
    .counter-element:after {     
      position: absolute;      
      left: 0;
      right: 0;      
      line-height: 1; 
      ${location}: ${offset}px;
      color: ${color};
      font-size: ${size}px;    
     }
     .counter-element.-day:after { content: '${day}'}
     .counter-element.-hour:after {content: '${hour}'}
     .counter-element.-min:after {content: '${min}'}
     .counter-element.-sec:after {content: '${sec}'}
     .counter-element.-counter:after {content: '${counter}'}
     
     
    }
    </style>`).appendTo("body");
  }

  window.onload = function() {
    if (typeof window.parent.tinymce !== 'undefined') {
      tinymce.get('counterBoxContent').on('keyup', function(e) {
        let content = this.getContent();
        previewContent(content);
      });
      tinymce.get('counterBoxContent').on('change', function(e) {
        let content = this.getContent();
        previewContent(content);
      });
    }
  };


})(jQuery);