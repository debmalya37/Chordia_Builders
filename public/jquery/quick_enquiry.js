function rootpath() {
  var root = '/'
  return root
}

// Global conversion trigger helper with de-duplication guard
function triggerGoogleAdsConversion(formElement) {
  var formAction = formElement ? $(formElement).attr('action') : window.location.href;

  // Initialize dataLayer safely
  window.dataLayer = window.dataLayer || [];

  // 1. Send via gtag if available
  if (typeof window.gtag === 'function') {
    window.gtag('event', 'conversion', {
      'send_to': 'AW-17559730445/z5lHCMwWj8IbE13ykLVB',
      'value': 1.0,
      'currency': 'INR'
    });
  } else {
    // Direct dataLayer fallback for gtag
    window.dataLayer.push('event', 'conversion', {
      'send_to': 'AW-17559730445/z5lHCMwWj8IbE13ykLVB',
      'value': 1.0,
      'currency': 'INR'
    });
  }

  // 2. Push explicit submit event for GTM
  window.dataLayer.push({
    'event': 'lead_form_submitted',
    'form_destination': formAction
  });

  console.log('Google Ads Conversion Event fired for: AW-17559730445/z5lHCMwWj8IbE13ykLVB');
}

$(document).ready(function () {
  // 1. Quick Inquiry Form & /buy-flats-in-jaipur forms (form#quickid or any posting to /sendcommon)
  $(document).on('submit', 'form#quickid, form[action*="sendcommon"]', function (e) {
    e.preventDefault()
    var form = this
    var $submitBtn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $(form).find('.wait').remove()
        $(form).after('<span class="wait"></span>')
        $submitBtn.prop('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $submitBtn.prop('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          // Validation failed: NO conversion hit
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          // Success: Reset form and FIRE CONVERSION HIT
          if (typeof toastr !== 'undefined') {
            toastr.success(data.msg)
          } else {
            alert(data.msg || 'Thank you! Your enquiry has been received.')
          }
          triggerGoogleAdsConversion(form)
          form.reset()

          // Show in-place confirmation message
          $(form).fadeOut(300, function () {
            $(form).closest('.banner-lead-glass-card, .contact-form-area')
                   .find('.form-content-wrap').hide()
            $(form).closest('.banner-lead-glass-card, .contact-form-area')
                   .find('.form-success-box').fadeIn(400)
          })
        }
      },
      error: function () {
        if (typeof toastr !== 'undefined') {
          toastr.error('Submission failed. Please check your inputs.')
        }
      }
    })
  })

  // 2. Contact Page Form
  $(document).on('submit', 'form#contactid', function (e) {
    e.preventDefault()
    var form = this
    var $submitBtn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $submitBtn.prop('disabled', true)
      },
      complete: function () {
        $submitBtn.prop('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          form.reset()
          alert(data.msg)
          triggerGoogleAdsConversion(form)
        }
      }
    })
  })

  // 3. Tour Booking Form
  $(document).on('submit', 'form#tourid', function (e) {
    e.preventDefault()
    var form = this
    var $submitBtn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $submitBtn.prop('disabled', true)
      },
      complete: function () {
        $submitBtn.prop('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          form.reset()
          alert(data.msg)
          triggerGoogleAdsConversion(form)
        }
      }
    })
  })

  // 4. Payment Form
  $(document).on('submit', 'form#paymentid', function (e) {
    e.preventDefault()
    var form = this
    var callback = $(form).attr('class')
    var $submitBtn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $(form).after('<span class="wait"></span>')
        $submitBtn.prop('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $submitBtn.prop('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.success(data.msg)
          }
          form.reset()
          triggerGoogleAdsConversion(form)
          location.href = rootpath() + callback
        }
      }
    })
  })

  // 5. Floating Glassmorphism Slider Forms (Home & Project Details)
  $(document).on('submit', 'form.ajax-glass-form', function (e) {
    e.preventDefault()
    var form = this
    var $btn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $btn.prop('disabled', true).text('Submitting...')
      },
      complete: function () {
        $btn.prop('disabled', false).text('Request Site Visit')
      },
      success: function (data) {
        if (data.status == 0) {
          // Validation error: Show error texts, NO conversion
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          // Success: Reset form and FIRE CONVERSION HIT
          if (typeof toastr !== 'undefined') {
            toastr.success(data.msg || 'Thank you! We will get in touch shortly.')
          }
          triggerGoogleAdsConversion(form)
          form.reset()

          // Show in-place confirmation message
          $(form).fadeOut(300, function () {
            $(form).closest('.banner-lead-glass-card, .contact-form-area')
                   .find('.form-content-wrap').hide()
            $(form).closest('.banner-lead-glass-card, .contact-form-area')
                   .find('.form-success-box').fadeIn(400)
          })
        }
      },
      error: function () {
        if (typeof toastr !== 'undefined') {
          toastr.error('Something went wrong. Please try again.')
        }
      }
    })
  })

  // 6. Popup Modal Form
  $(document).on('submit', 'form#modelid', function (e) {
    e.preventDefault()
    var form = this
    var $submitBtn = $(form).find('button[type="submit"], input[type="submit"]')

    $.ajax({
      url: $(form).attr('action'),
      method: $(form).attr('method') || 'POST',
      data: new FormData(form),
      processData: false,
      dataType: 'json',
      contentType: false,
      beforeSend: function () {
        $(form).find('span.error-text').text('')
        $(form).after('<span class="wait"></span>')
        $submitBtn.prop('disabled', true)
      },
      complete: function () {
        $('.wait').remove()
        $submitBtn.prop('disabled', false)
      },
      success: function (data) {
        if (data.status == 0) {
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          if (typeof toastr !== 'undefined') {
            toastr.success(data.msg)
          }
          form.reset()
          triggerGoogleAdsConversion(form)
        }
      }
    })
  })
})

// 7. Global Safety Fallback for /buy-flats-in-jaipur or any custom AJAX form submitting to /sendcommon
$(document).ajaxSuccess(function (event, xhr, settings) {
  if (settings.url && settings.url.indexOf('sendcommon') !== -1) {
    try {
      var res = JSON.parse(xhr.responseText)
      if (res.status != 0 && (res.status == 1 || res.status == 200 || res.success)) {
        if (typeof gtag === 'function' && !window._globalConversionFired) {
          window._globalConversionFired = true
          gtag('event', 'conversion', {
            'send_to': 'AW-17559730445/z5lHCMwWj8IbE13ykLVB',
            'value': 1.0,
            'currency': 'INR'
          })
          console.log('Global fallback conversion hit sent to AW-17559730445/z5lHCMwWj8IbE13ykLVB')
          setTimeout(function () {
            window._globalConversionFired = false
          }, 3500)
        }
      }
    } catch (e) {
      // Non-JSON response handling
    }
  }
})