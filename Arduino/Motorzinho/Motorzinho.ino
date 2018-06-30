void setup() {
  Serial.begin(9600);
  pinMode(7, OUTPUT);
  pinMode(8, OUTPUT);

}
bool bAt = false;
void loop() { 
  digitalWrite(7, LOW);
  digitalWrite(8, LOW);     
  if(Serial.available() > 0){       
    if(bAt == true && Serial.parseInt() == 1){
      analogWrite(7, 130);
      bAt = false;
      delay(1300);    
      Serial.println("motor");  
      return;  
      }
      if(bAt == false && Serial.parseInt() == 0){
        bAt = true;
        analogWrite(8, 150);
        delay(2000);  
        Serial.println("motor");   
        return;          
      }
     Serial.println("motor");      
  }
}
