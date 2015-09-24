#include <iostream>
#include <fstream>
#include <string>
using namespace std;

const char headerBegin[] {'<', '!', '-', '-', 's', 'd', 'h', '-', '-', '>'};
const char headerEnd[] {'<', '!', '-', '-', 'e', 'd', 'h', '-', '-', '>'};

void synchroniseerNaarBestand (string filename, string header) {
    // Open output file voor lezen
    ifstream outputIn (filename.c_str(), ios::in);

    // Initialiseeer de secties
    string section1 = "";
    string section3 = "";

    // Waarden om status te volgen
    int currentMatch = 0;
    bool headerFound = false;
    bool headerEnded = false;

    // Lees output bestand om de code om de header te vinden
    char kar = outputIn.get();
    while (!outputIn.eof()) {

        if (currentMatch == 10 && !headerFound)
            headerFound = true;
        else if (currentMatch == 10 && headerFound && !headerEnded)
            headerEnded = true;

        // Kijk of het huidig karakter de volgende is van een van
        // de sequanties van de header
        if ((!headerFound && kar == headerBegin[currentMatch])
        || (headerFound && !headerEnded && kar == headerEnd[currentMatch]))
            currentMatch++;
        else
            currentMatch = 0;

        // Voeg karakter aan sectie 1 of 3 toe indien nodig
        if (!headerFound)
            section1 += kar;
        else if (headerEnded)
            section3 += kar;

        kar = outputIn.get();
    }

    outputIn.close(); // Sluit input file

    cout << section1 << endl
         << "---------------------------------------------"
         << header << endl
         << "---------------------------------------------"
         << section3 << endl;

    // Stop output in output bestand
    ofstream outputOut (filename.c_str(), ios::out);
    outputOut << section1 << header << section3;
    outputOut.close();
}//synchroniseerNaarBestand

int main() {
     // Open index file om te lezen
    ifstream index ("./../index.html", ios::in);
    string header = "";

    // Waarden om status te volgen
    int currentMatch = 0;
    bool headerFound = false;
    bool headerEnded = false;

    // Lees de index om de header te verkrijgen
    char kar = index.get();
    while (!index.eof()) {

        if (currentMatch == 10 && !headerFound)
            headerFound = true;
        else if (currentMatch == 10 && headerFound && !headerEnded)
            headerEnded = true;

        // Kijk of het huidig karakter de volgende is van een van
        // de sequanties van de header
        if ((!headerFound && kar == headerBegin[currentMatch])
        || (headerFound && !headerEnded && kar == headerEnd[currentMatch]))
            currentMatch++;
        else
            currentMatch = 0;

        // Voeg karakter aan sectie 2 toe indien nodig
        if (headerFound && !headerEnded)
            header += kar;

        kar = index.get();
    }

    index.close(); // Sluit input file
    header.replace(header.find(" class=\"active\""), sizeof("")-1, "");

    synchroniseerNaarBestand ("./../contact.html", header);

    return 0;
}
