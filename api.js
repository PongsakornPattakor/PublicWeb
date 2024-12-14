const apiKey =
  "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjhiNDQzZmQ4ZmJkNzI3YjE0NzY5MGY3OTk0Y2EzMmI1ZTgxNWRlODE4MDY2ZTRlYjhjMDUxMmNiZGY2YmUyMDc2NmU3MGVhNTk2ZjdiNmY5In0.eyJhdWQiOiIyIiwianRpIjoiOGI0NDNmZDhmYmQ3MjdiMTQ3NjkwZjc5OTRjYTMyYjVlODE1ZGU4MTgwNjZlNGViOGMwNTEyY2JkZjZiZTIwNzY2ZTcwZWE1OTZmN2I2ZjkiLCJpYXQiOjE3MzI3MDQ3NjUsIm5iZiI6MTczMjcwNDc2NSwiZXhwIjoxNzY0MjQwNzY1LCJzdWIiOiIzNTc3Iiwic2NvcGVzIjpbXX0.YN4_mHhXBp4__APvC7vRy-S2R7mcjEU-IsEBm_WSUVKRdajWKivrqNKpQnYaFxjYTJnrkD4geOm20YieAKG4TCGWWz32SM4lBnldRekZdP8jWzz5DWNXUyugQtXTg5kEhHa_f7tPcrLz3I3OJ4o7s91_lXWAaeTsDTG-NVm9gcG6A9V_MA3DX_Z5w_ZSSpM1qI8OZonIIqIKioryB4FC4YJ9JpxkA-MuEtzzQejIQJ4x_LOb-lbY1jHDDLya_MSCFiXdrRnwhhXAe4QLh6o6UUZ5dG9A4h8SOW0-Bjkk2HuyDh60NxOKR--qFXf_DVTg39K8bd_C9DrAseJ17DK_DaeUMjThr449OFCbcdr51aGFq-KanUxUMwQ77o8HGVeecFpKdW6ukBxi6qBcasWnwdCx3dAV6ab024Zddr50gzPp-0bGQ-y15J-YotTpwd8UCFxz6ghfcTg0Ms8kCwS8jVBCI22he9xONqUJOM17z0ODrQZvvOG3oQCkmGe_Cy2rB8K9n4vYl9Kl8NkpYA3UKFob9F2h4NZqQAksKcHfsAi3DxmKmkNQxokBYLUiM2gzhpqFNJGCgunEABf3p_MZXhRVG-esi2rizMc66ejpgeDnwi9541YGSJaGUq1qbF46jFly-FsdbMDA52_hRm1Ox61c_gTUV9K6wCHV4EpN-4A";

const inputProvince = document.getElementById("search-province");

// API request
async function apiRequest() {
  const tempCelUnit = document.getElementById("temp-cel");
  const humidity = document.getElementById("humidity");
  const condition = document.getElementById("condition");
  const province = document.getElementById("search-province").value.trim();

  const apiURL = `https://data.tmd.go.th/nwpapi/v1/forecast/location/daily/place?province=${province}`;

  // if input is empty
  if (!province) {
    alert("Please fill the province in Thailand");
  }
  try {
    // fetch data
    const response = await fetch(apiURL, {
      crossDomain: true,
      method: "GET",
      headers: {
        accept: "application/json",
        authorization: `Bearer ${apiKey}`,
      },
    });

    if (!response.ok) {
      throw new Error("ไม่สามารถดึงข้อมูลได้");
    }

    // converts data to JSON
    const dataObj = await response.json();
    console.log("ข้อมูลที่ได้กลับมา", dataObj);

    let tempCelObj = dataObj.WeatherForecasts[0].forecasts[0].data.tc;
    let humidObj = dataObj.WeatherForecasts[0].forecasts[0].data.rh;
    let conditionObj = dataObj.WeatherForecasts[0].forecasts[0].data.cond;

    switch (conditionObj) {
      case 1:
        condition.innerText = "Clear";
        break;
      case 2:
        condition.innerText = "Partly cloudy";
        break;
      case 3:
        condition.innerText = "Cloudy";
        break;
      case 4:
        condition.innerText = "Overcast";
        break;
      case 5:
        condition.innerText = "Light rain";
        break;
      case 6:
        condition.innerText = "Moderate rain";
        break;
      case 7:
        condition.innerText = "Heavy rain";
        break;
      case 8:
        condition.innerText = "Thunderstorm";
        break;
      case 9:
        condition.innerText = "Very cold";
        break;
      case 10:
        condition.innerText = "Cold";
        break;
      case 11:
        condition.innerText = "Cool";
        break;
      case 12:
        condition.innerText = "Very hot";
        break;
      default:
        condition.innerText = "No weather condition data";
        break;
    }

    tempCelUnit.innerText = `${tempCelObj} °C`;
    humidity.innerText = `${humidObj} %`;
  } catch (error) {
    console.error("เกิดข้อผิดพลาด : ", error);
  }
}

// Enter press key
function enterPress(event) {
  if (event.key == "Enter") {
    apiRequest();
  }
}

const searchBtn = document.getElementById("confirm-search");
searchBtn.addEventListener("click", apiRequest);
inputProvince.addEventListener("keyup", enterPress);
// inputAmphoe.addEventListener("keyup", enterPress);
