using System;
using System.Threading;
using System.IO.Ports;
namespace Arduino
{
	class MainClass
	{
		static SerialPort _sPorta; // Objeto onde tem as funçoes para se comunicar com o arduino
		static int Tentativas = 0; // Variavel onde ficará o numero de tentativas

		public static void Main(string[] args)
		{
			try{
				_sPorta = new SerialPort();
				/*Propriedades para ler a porta*/
				_sPorta.PortName = args[0]; //Nome da por (puchando parametro 1);
				_sPorta.BaudRate = 9600; //Velocidade da comunicaçao
				_sPorta.Parity = Parity.None;
				_sPorta.DataBits = 8;
				_sPorta.StopBits = StopBits.Two;
				_sPorta.Handshake = Handshake.XOnXOff;

				_sPorta.ReadTimeout = 5000; // Tempo de resposta tem que ser no maximo 5 segundos(5mil milesegundos), depois disso ele da error.

				_sPorta.Open(); // Abre a conexao com o arduino 

				_sPorta.Write(args[1]); // Manda o comando para o arduino
				Console.WriteLine(_sPorta.ReadLine()); // Ler o retorno do arduino

			}
			catch { // Caso de error
				if (++Tentativas > 10){ // Ele verificar o numero de tentativas, ja incrementando ele
					Environment.Exit(1); // caso teja mais de 10 tentativas ele fecha o programa
				}
				else{ // se nao
					Thread.Sleep(500); //da uma pausa de 500 milisegundos(meio segundo)
					Main(args); //Volta do inicio, e tenta fazer a comunicaçao novamente.
				}
			}
		}
	}
}
