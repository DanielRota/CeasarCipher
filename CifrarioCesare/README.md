Daniel Rota 5IC - Sistemi e Reti - ITIS P. Paleocapa A.S. 2022/2023

<h1>CIFRARIO DI CESARE</h1>

<h2>INTRODUZIONE GENERALE</h2>

L'algoritmo di cifratura rientra nei cifrari a sostituzione monoalfabetica.

<h2>FUNZIONAMENTO</h2>
 
Esso basa il proprio funzionamento su una Chiave, ovvero un numero intero che indica di quanti caratteri ogni lettera del messaggio che si intende cifrare deve essere spostata avanti o indietro.

Esempio:

- Messaggio: 'Giorgio'
- Chiave: 3

Il messaggio viene inizialmente suddiviso in singoli caratteri, oguno dei quali viene modificato all'interno di un'iterazione.

Il primo carattere è "G", e deve essere spostato in avanti di 3 posizioni, come specificato dalla Chiave, verrà pertanto cifrato con la lettera "J", il carattere successivo "i" verrà rappresentato dalla lettera "l" e così via; il risultato finale dell'elaborazione equivale a 'Jlurjlr'. Per quanto riguarda invece la decifratura di un messaggio, viene eseguito semplicemente il procedimento inverso.
