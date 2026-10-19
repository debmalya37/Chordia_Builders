function rootpath() {
  var root = '/'
  return root
}

// Global conversion trigger helper with de-duplication guard
function triggerGoogleAdsConversion(formElement) {
  var formAction = formElement ? $(formElement).attr('action') : window.location.href;

  // De-duplication check to prevent double-firing
  if (formElement && $(formElement).data('conversion-sent')) {
    return;
  }
  if (formElement) {
    $(formElement).data('conversion-sent', true);
  }

  // Ensure dataLayer exists
  window.dataLayer = window.dataLayer || [];

  // 1. Official Google Ads gtag conversion dispatch (Adapted from client's new snippet)
  if (typeof window.gtag === 'function') {
    window.gtag('event', 'conversion', {
      'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB',
      'value': 1.0,
      'currency': 'INR'
    });
  }

  // 2. Google Tag Manager / GA4 standard custom conversion payload
  window.dataLayer.push({
    'event': 'conversion',
    'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB',
    'conversion_id': 'AW-17559730445',
    'conversion_label': 'z5lHCMvWj8IbEI3ykLVB',
    'value': 1.0,
    'currency': 'INR'
  });

  // 3. Custom event for GTM triggers matching client's "Submit lead form" tag
  window.dataLayer.push({
    'event': 'lead_form_submitted',
    'form_destination': formAction
  });

  console.log('Google Ads Conversion Event fired for: AW-17559730445/z5lHCMvWj8IbEI3ykLVB');
}

$(document).ready(function () {
  // =========================================================================
  // 1. BANNER SLIDER FORMS (Home & Eraya Project Sliders) - HIGHEST PRIORITY
  // =========================================================================
  $(document).on('submit', 'form.ajax-glass-form', function (e) {
    e.preventDefault()
    e.stopImmediatePropagation() // CRITICAL: Stops the generic handler below from intercepting this form
    
    var form = this
    var $card = $(form).closest('.banner-lead-glass-card')
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
          // Validation error: show validation text
          $.each(data.error, function (prefix, val) {
            $(form).find('span.' + prefix + '_error').text(val[0])
          })
        } else {
          // 1. Fire conversion hit and print console log
          triggerGoogleAdsConversion(form)

          // 2. Reset the form inputs
          form.reset()

          // 3. Hide the form and reveal in-place success container
          $card.find('.form-content-wrap').fadeOut(300, function () {
            $card.find('.form-success-box').fadeIn(400)
          })

          if (typeof toastr !== 'undefined') {
            toastr.success(data.msg || 'Thank you! We will get in touch shortly.')
          }
        }
      },
      error: function () {
        $btn.prop('disabled', false).text('Request Site Visit')
        if (typeof toastr !== 'undefined') {
          toastr.error('Something went wrong. Please try again.')
        } else {
          alert('Something went wrong. Please try again.')
        }
      }
    })
  })

  // =========================================================================
  // 2. QUICK ENQUIRY FORM (Footer / General Page forms & Landing Pages)
  // =========================================================================
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

  // =========================================================================
  // 3. CONTACT PAGE FORM
  // =========================================================================
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

  // =========================================================================
  // 4. TOUR BOOKING FORM
  // =========================================================================
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

  // =========================================================================
  // 5. PAYMENT FORM
  // =========================================================================
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
          triggerGoogleAdsConversion(form)
          form.reset()
          location.href = rootpath() + callback
        }
      }
    })
  })

  // =========================================================================
  // 6. POPUP MODAL FORM
  // =========================================================================
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
          triggerGoogleAdsConversion(form)
          form.reset()
        }
      }
    })
  })
})

// =========================================================================
// 7. GLOBAL SAFETY FALLBACK FOR CUSTOM AJAX SUBMISSIONS
// =========================================================================
$(document).ajaxSuccess(function (event, xhr, settings) {
  if (settings.url && settings.url.indexOf('sendcommon') !== -1) {
    try {
      var res = JSON.parse(xhr.responseText)
      if (res.status != 0 && (res.status == 1 || res.status == 200 || res.success)) {
        if (!window._globalConversionFired) {
          window._globalConversionFired = true
          
          // Ensure dataLayer exists
          window.dataLayer = window.dataLayer || [];
          
          window.dataLayer.push({
            'event': 'conversion',
            'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB',
            'conversion_id': 'AW-17559730445',
            'conversion_label': 'z5lHCMvWj8IbEI3ykLVB',
            'value': 1.0,
            'currency': 'INR'
          });

          if (typeof gtag === 'function') {
            gtag('event', 'conversion', {
              'send_to': 'AW-17559730445/z5lHCMvWj8IbEI3ykLVB',
              'value': 1.0,
              'currency': 'INR'
            })
          }
          
          console.log('Global fallback conversion hit sent to AW-17559730445/z5lHCMvWj8IbEI3ykLVB')
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