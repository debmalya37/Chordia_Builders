function rootpath() {
  var root = '/'
  return root
}

// Global conversion trigger helper
function triggerGoogleAdsConversion() {
  if (typeof gtag === 'function') {
    gtag('event', 'conversion', {
      'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB',
      'value': 1.0,
      'currency': 'INR'
    })
    console.log('Google Ads lead conversion fired successfully.')
  }
}

$(document).ready(function () {
  // 1. Quick Inquiry Form (Used across pages and in new-project.blade.php)
  $('#quickid').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(document).find('span.error-text').text('')
        $('#quickid').after('<span class="wait"></span>')
        $('#quickid').attr('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $('#quickid').attr('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          // Validation failed: NO conversion hit
          $.each(data.error, function (prefix, val) {
            $('span.' + prefix + '_error').text(val[0])
          })
        } else {
          // Success: Show toastr, reset form, and FIRE CONVERSION HIT
          toastr.success(data.msg)
          $('#quickid')[0].reset()
          triggerGoogleAdsConversion()
        }
      },
    })
  })

  // 2. Contact Page Form
  $('#contactid').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(document).find('span.error-text').text('')
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $('span.' + prefix + '_error').text(val[0])
          })
        } else {
          $('#contactid')[0].reset()
          alert(data.msg)
          triggerGoogleAdsConversion()
        }
      },
    })
  })

  // 3. Tour Booking Form
  $('#tourid').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(document).find('span.error-text').text('')
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $('span.' + prefix + '_error').text(val[0])
          })
        } else {
          $('#tourid')[0].reset()
          alert(data.msg)
          triggerGoogleAdsConversion()
        }
      },
    })
  })

  // 4. Payment Form
  $('#paymentid').on('submit', function (e) {
    e.preventDefault()
    var callback = $(this).attr('class')
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(document).find('span.error-text').text('')
        $('#paymentid').after('<span class="wait"></span>')
        $('#paymentid').attr('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $('#paymentid').attr('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $('span.' + prefix + '_error').text(val[0])
          })
        } else {
          toastr.success(data.msg)
          $('#paymentid')[0].reset()
          triggerGoogleAdsConversion()
          location.href = rootpath() + callback
        }
      },
    })
  })

  // 5. Popup Modal Form
  $('#modelid').on('submit', function (e) {
    e.preventDefault()
    $.ajax({
      url: $(this).attr('action'),
      method: $(this).attr('method'),
      data: new FormData(this),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(document).find('span.error-text').text('')
        $('#modelid').after('<span class="wait"></span>')
        $('#modelid').attr('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $('#modelid').attr('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $('span.' + prefix + '_error').text(val[0])
          })
        } else {
          toastr.success(data.msg)
          $('#modelid')[0].reset()
          triggerGoogleAdsConversion()
        }
      },
    })
  })
})