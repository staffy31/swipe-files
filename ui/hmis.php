<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Health Centers HMIS Report</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      line-height: 1.6;
    }

    fieldset {
      border: 1px solid #ccc;
      margin-bottom: 20px;
      padding: 20px;
    }

    legend {
      font-size: 1.2em;
      font-weight: bold;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .input-group {
      margin-bottom: 10px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }

    th,
    td {
      padding: 8px;
      border: 1px solid #ddd;
      text-align: center;
    }

    h3 {
      margin-top: 20px;
    }
  </style>
</head>

<body>

  <h1>Health Centers Monthly HMIS Report</h1>

  <fieldset>
    <legend>Identification</legend>
    <div class="input-group">
      <label>Facility Name:</label>
      <span>Example Health Center</span>
    </div>
    <div class="input-group">
      <label>Catchment Area Population:</label>
      <span>20,000</span>
    </div>
    <div class="input-group">
      <label>Year:</label>
      <span>2024</span>
    </div>
    <div class="input-group">
      <label>Month:</label>
      <span>January</span>
    </div>
  </fieldset>
  <fieldset>
    <legend>Outpatient Consultations</legend>

    <h3>A) Outpatient Morbidity Summary</h3>
    <table>
      <tr>
        <th>Category</th>
        <th>Male (Under 5 yrs)</th>
        <th>Female (Under 5 yrs)</th>
        <th>Male (5 yrs and above)</th>
        <th>Female (5 yrs and above)</th>
      </tr>
      <tr>
        <td>New Cases</td>
        <td>200</td>
        <td>150</td>
        <td>220</td>
        <td>180</td>
      </tr>
      <tr>
        <td>Old Cases</td>
        <td>50</td>
        <td>40</td>
        <td>60</td>
        <td>55</td>
      </tr>
    </table>

    <h3>B) Referrals</h3>
    <div class="input-group">
      <label>Referred to Hospital:</label>
      <span>35</span>
    </div>
    <div class="input-group">
      <label>Counter Referrals Received:</label>
      <span>10</span>
    </div>
  </fieldset>
  <fieldset>
    <legend>Health Insurance Status</legend>

    <div class="input-group">
      <label>CBHI Cases:</label>
      <span>80</span>
    </div>
    <div class="input-group">
      <label>RAMA Cases:</label>
      <span>45</span>
    </div>
    <div class="input-group">
      <label>MMI Cases:</label>
      <span>30</span>
    </div>
    <div class="input-group">
      <label>Non-Insured Cases:</label>
      <span>20</span>
    </div>

    <h4>Total Amount of Bills</h4>
    <div class="input-group">
      <label>Total Co-Payment:</label>
      <span>$2,000</span>
    </div>
    <div class="input-group">
      <label>Total Bills Submitted:</label>
      <span>$4,500</span>
    </div>
    <div class="input-group">
      <label>Total Bills Paid:</label>
      <span>$3,800</span>
    </div>
  </fieldset>
  <fieldset>
    <legend>Integrated Management of Childhood Illnesses (IMCI)</legend>

    <table>
      <tr>
        <th>Age Group</th>
        <th>Received</th>
        <th>Danger Signs</th>
        <th>Fever Cases</th>
        <th>Breathing Issues</th>
        <th>Diarrhea Cases</th>
      </tr>
      <tr>
        <td>Under 7 Days</td>
        <td>5</td>
        <td>1</td>
        <td>2</td>
        <td>1</td>
        <td>1</td>
      </tr>
      <tr>
        <td>7 Days - 2 Months</td>
        <td>12</td>
        <td>3</td>
        <td>4</td>
        <td>2</td>
        <td>3</td>
      </tr>
      <tr>
        <td>2 - 59 Months</td>
        <td>15</td>
        <td>2</td>
        <td>7</td>
        <td>3</td>
        <td>3</td>
      </tr>
    </table>
  </fieldset>
</body>

</html>