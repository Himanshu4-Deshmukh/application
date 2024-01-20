$(document).ready(function() {
    $('#category').change(function() {
      //alert('testing');
      let category_id = $(this).val();
      $.ajax({
        url: "ajax1.php",
        type: "post",
        data: {
          'category_id': category_id
        },
        success: function(result) {
          let jsonResult = JSON.parse(result);
          let rtoSelect = $('#rto');

          // Clear existing options
          rtoSelect.find('option').remove();

          // Add a default blank option
          rtoSelect.append('<option value="">Select RTO</option>');

          // Populate with data from AJAX response
          $.each(jsonResult, function(key, value) {
            rtoSelect.append(`<option value="${key}">${value}</option>`);
          });
        }
      })
    });

    //fetch city based on sub_category
    $('#rto').change(function() {
      //alert('testing');
      let rto = $(this).val();
      $.ajax({
        url: "ajax1.php",
        type: "post",
        data: {
          'rto': rto
        },
        success: function(result) {
          let jsonResult = JSON.parse(result);
          $('#location').val(jsonResult[0]);
          // console.log(jsonResult);
        }
      })
    })
  });





   // Add this code inside your existing $(document).ready() function

// Function to fetch services based on RTO and Category
function fetchServices() {
    let category = $('#category').val();
    let rto = $('#rto').val();
  
    // Send an AJAX request to fetch services for the selected RTO and Category
    $.ajax({
      url: "fetch_services1.php", // Update this with the actual URL to fetch services
      type: "post",
      data: {
        'category': category,
        'rto': rto
      },
      success: function(result) {
        let servicesSelect = $('#rto_services');
  
        // Clear existing options
        servicesSelect.find('option').remove();
  
        // Add a default blank option
        servicesSelect.append('<option value="">Select Service</option>');
  
        // Populate with data from AJAX response
        servicesSelect.append(result);
      }
    });
  }
  
  // Call the fetchServices function when either the "Category" or "RTO" changes
  $('#category, #rto').change(function() {
    fetchServices();
  });
  
  // Call fetchServices initially to populate services based on the initial values of Category and RTO
  fetchServices();
  
  

   // Add this code inside your existing $(document).ready() function

function fetchServiceDetails() {
    let category = $('#category').val();
    let rto = $('#rto').val();
    let service = $('#rto_services').val();
  
    // Send an AJAX request to fetch the price and government fees for the selected service, category, and RTO
    $.ajax({
      url: "fetch_service_details1.php", // Update with the actual URL to fetch service details
      type: "post",
      data: {
        'category': category,
        'rto': rto,
        'service': service
      },
      success: function(result) {
        // Parse the JSON response
        let serviceDetails = JSON.parse(result);
  
        // Fill the "Price" and "Govt. Price" fields with the fetched values
        $('#rto_price').val(serviceDetails.price);
        $('#gov_price').val(serviceDetails.govt_price);
      },
      
    });
  }
  
  // Call the fetchServiceDetails function when any of the select fields change
  $('#category, #rto, #rto_services').change(function() {
    fetchServiceDetails();
  });
  
  // Call fetchServiceDetails initially to populate prices based on the initial values of Category, RTO, and Service
  fetchServiceDetails();


