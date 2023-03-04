<!DOCTYPE html>
<html>
<head>
<style>
.customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

.customers td, .customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

.customers tr:nth-child(even){background-color: #f2f2f2;}

.customers tr:hover {background-color: #ddd;}

.customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: blue;
  color: white;
}
</style>
</head>
<body>
<table class="customers">
    <tr>
        <td style="width: 25%">
            {{-- <img src="{{ asset('../assets/img/logo.png') }}" width="50px" height="50px"> --}}
        </td>
        <td style="font-size:40px; font-weight: bold;padding:20px;color:blue; text-align: center; width: 50%">
            Medicool
        </td>
        <td style="width: 25%">
            <span style="font-size:15px; font-weight: bold; color:black;">Health File | No. {{ $details['health']['id'] }}</span>
            <br>
            <span style="font-size:15px;font-weight: bold; color:black">Date: {{ $details['health']['date'] }}</span>
        </td>
    </tr>
    <tr>
        <td style="font-size: 17px; text-align: center" colspan="3">
            <div style="display: flex; flex-direction: row">
                <div>
                    <span style="font-weight: bold">Name:</span> <span style="font-style: italic">{{ $details['patient']['user']['name'] }}</span>
                    <span style="font-weight: bold">Email:</span> 
                    <span style="font-style: italic">{{ $details['patient']['user']['email'] }}</span>
                    <span style="font-weight: bold">Phone:</span> 
                    <span style="font-style: italic">{{ $details['patient']['phone'] }}</span>
                    <span style="font-weight: bold">Weight:</span> 
                    <span style="font-style: italic">{{ $details['health']['weight'] }}kg</span>

                </div>
                <div>
                    <span style="font-weight: bold">Address: </span>
                    <span style="font-style: italic">{{ $details['patient']['address'] }}</span>
                    <span style="font-weight: bold">Birth Date:</span> 
                    <span style="font-style: italic">{{ $details['patient']['bod'] }}</span>
                    <span style="font-weight: bold">Gender:</span> 
                    <span style="font-style: italic">{{ $details['patient']['gender'] }}</span>
                    <span style="font-weight: bold">Height:</span> 
                    <span style="font-style: italic">{{ $details['health']['height'] }}cm</span>
                    <span style="font-weight: bold">Blood Group:</span> 
                    <span style="font-style: italic">{{ $details['health']['blood_type'] }}</span>
                </div>
            </div>      
        </td>
    </tr>
</table>

<br>
<table class="customers">
    <tr>
        <th colspan="2" style="text-align: center; font-size: 20px">Medical Report</th>
    </tr>
    <tr>
       <td style="font-weight: bold;">
        Reason For Seeing the Doctor + Symptoms
       </td>
       <td style="text-align: right">
        {{ $details['health']['symptoms'] }}
       </td>
    </tr>
    <tr>
        <td style="font-weight: bold;">
         Allergies
        </td>
        <td style="text-align: right">
         {{ $details['health']['allergies'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Conditions
        </td>
        <td style="text-align: right">
         {{ $details['health']['conditions'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Operations
        </td>
        <td style="text-align: right">
         {{ $details['health']['operations'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Medications
        </td>
        <td style="text-align: right;">
         {{ $details['health']['medications'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Exercise
        </td>
        <td style="text-align: right">
         {{ $details['health']['exercise'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Diet
        </td>
        <td style="text-align: right">
         {{ $details['health']['diet'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
         Alcohol Consumption
        </td>
        <td style="text-align: right">
         {{ $details['health']['alcohol'] }}
        </td>
     </tr>
     <tr>
        <td style="font-weight: bold;">
        Caffeine Consumption
        </td>
        <td style="text-align: right">
         {{ $details['health']['caffeine'] }}
        </td>
     </tr>
</table>
</body>
</html>


