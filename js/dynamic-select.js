const data = {
  "countries": [
      {
          "name": "USA",
          "cities": [
              {
                  "name": "New York",
                  "districts": ["Manhattan", "Brooklyn", "Queens"]
              },
              {
                  "name": "Los Angeles",
                  "districts": ["Hollywood", "Downtown", "Venice"]
              }
          ]
      },
      {
          "name": "India",
          "cities": [
              {
                  "name": "Mumbai",
                  "districts": ["Andheri", "Bandra", "Dadar"]
              },
              {
                  "name": "Delhi",
                  "districts": ["Dwarka", "Rohini", "Vasant Kunj"]
              }
          ]
      }
  ]
};

function loadCountries() {
  const countrySelect = document.getElementById("country");
  data.countries.forEach(country => {
      let option = document.createElement("option");
      option.value = country.name;
      option.textContent = country.name;
      countrySelect.appendChild(option);
  });
}

function loadCities() {
  const citySelect = document.getElementById("city");
  citySelect.innerHTML = '<option value="">Select City</option>';
  const countryName = document.getElementById("country").value;
  
  const country = data.countries.find(c => c.name === countryName);
  
  if (country) {
      country.cities.forEach(city => {
          let option = document.createElement("option");
          option.value = city.name;
          option.textContent = city.name;
          citySelect.appendChild(option);
      });
  }

  loadDistricts();  // Clear districts when country is changed
}

function loadDistricts() {
  const districtSelect = document.getElementById("district");
  districtSelect.innerHTML = '<option value="">Select District</option>';
  const cityName = document.getElementById("city").value;
  const countryName = document.getElementById("country").value;

  const country = data.countries.find(c => c.name === countryName);
  if (country) {
      const city = country.cities.find(c => c.name === cityName);
      if (city) {
          city.districts.forEach(district => {
              let option = document.createElement("option");
              option.value = district;
              option.textContent = district;
              districtSelect.appendChild(option);
          });
      }
  }
}

// Initialize on page load
window.onload = loadCountries;
