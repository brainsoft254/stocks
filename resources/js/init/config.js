let config;

if (process.env.NODE_ENV === "production") {
  config = {
    apiUrli: "https://joedream.stockcity.co.ke/",
  };
} else {
  config = {
    apiUrli: "http://localhost:8000/",
    
  };
}

export { config }