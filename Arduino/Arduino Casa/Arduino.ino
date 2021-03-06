byte Portas[16] = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
void setup() {
  Serial.begin(9600);
     
  for(int i = 2; i <= 12; i++)
    pinMode(i, OUTPUT);
}
String Split(String data, char separator, int index)
{
  int found = 0;
  int strIndex[] = {0, -1};
  int maxIndex = data.length()-1;

  for(int i=0; i<=maxIndex && found<=index; i++){
    if(data.charAt(i)==separator || i==maxIndex){
        found++;
        strIndex[0] = strIndex[1]+1;
        strIndex[1] = (i == maxIndex) ? i+1 : i;
    }
  }

  return found>index ? data.substring(strIndex[0], strIndex[1]) : "";
}
String Status()
{
  String Retorno = "";
       for(int i = 2; i <= 12; i++){
        Retorno = Retorno + Portas[i];
       }
  return Retorno;
}
bool inStr(char chave, String str){
  return (str.indexOf(chave, 0) > -1);
}
void loop() {
  
  if(Serial.available() > 0){   
    String r = Serial.readString();
    if(r == "status"){
      String Retorno = Status();       
      Serial.println(Retorno);
      return;
    }
    if(r == "ligtudo"){
      for(int i = 2; i <= 12; i++){
        digitalWrite(i, HIGH);
      }
      Serial.println(Status());
      return;
    }
    if(r == "destudo"){
      for(int i = 2; i <= 12; i++){
        digitalWrite(i, LOW);
      }
      Serial.println(Status());
      return;
    }
    
    if(!inStr(';', r))     
        return;
              
    int Porta = Split(r, ';', 0).toInt(); 
    int Estado = Split(r, ';', 1).toInt();
    if (!(Porta >= 2 && Porta <= 12) || !(Estado == 0 || Estado == 1))
      return;
    digitalWrite(Porta, Estado);
    Portas[Porta] = Estado;
    Serial.println(Status());
  }

 
}
/**/
  
