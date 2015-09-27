#include <iostream>
#include <fstream>
#include <string>
using namespace std;

string leesTotSequentie (ifstream& file, char sequentie[]) {
    string read = ""; // Return string
    // Waarden om status te volgen
    int currentMatch = 0;
    bool sequenceFound = false;

    // Lees de file om deze sectie te verkrijgen
    char kar = file.get();
    while (!file.eof()) {
        if (currentMatch == 10)
            sequenceFound = true;

        // Kijk of het huidig karakter de volgende is van de sequentie
        if (kar == sequentie[currentMatch])
            currentMatch++;
        else
            currentMatch = 0;

        // Voeg karakter aan return toe
        read += kar;

        // Stop zodra de sequentie is gevonden
        if (sequenceFound)
            break;

        kar = file.get();
    }

    return read;
}//leesTotSequentie

string leesTotEindBestand (ifstream& file) {
    string read = ""; // Return string

    char kar = file.get();
    while (!file.eof()) {
        read += kar;
        kar = file.get();
    }

    return read;
}//leesTotEindBestand

string leesTotBeginHeader (ifstream& file) {
    char headerBegin[] {'<', '!', '-', '-', 's', 'd', 'h', '-', '-', '>'};
    return leesTotSequentie(file, headerBegin);
}//leesTotBeginHeader

string leesTotEindHeader (ifstream& file) {
    char headerEnd[] {'<', '!', '-', '-', 'e', 'd', 'h', '-', '-', '>'};
    return leesTotSequentie(file, headerEnd);
}//leesTotEindHeader

void synchroniseerNaarBestand (string filename, string header) {
    // Open output file voor lezen
    string filepath = "./../" + filename;
    ifstream outputIn (filepath.c_str(), ios::in);

    // Maak de secties
    string section1 = leesTotBeginHeader(outputIn);
    leesTotEindHeader(outputIn);
    string section3 = leesTotEindBestand(outputIn);

    // Sluit output file
    outputIn.close();

    // Bewerk header
    string findString = "<li><a href=\"" + filename + "\">";
    string toString = "<li class=\"active\"><a href=\"" + filename + "\">";
    header.replace(header.find(findString), findString.length(), toString);

    cout << section1
         << "---------------------------------------------" << endl
         << header
         << "---------------------------------------------"
         << section3 << endl;

    // Stop output in output bestand
    ofstream outputOut (filepath.c_str(), ios::out);
    outputOut << section1 << header << section3;
    outputOut.close();
}//synchroniseerNaarBestand

int main() {
     // Open index file om te lezen
    ifstream index ("./../index.html", ios::in);
    // Vind de header
    leesTotBeginHeader(index);
    string header = leesTotEindHeader(index);
    // Sluit input file
    index.close();
    // Bewerk de header
    header.replace(header.find("<li class=\"active\">"), sizeof("<li class=\"active\">")-1, "<li>");

    synchroniseerNaarBestand ("vak_bp.html", header);
    synchroniseerNaarBestand ("vak_fi1.html", header);
    synchroniseerNaarBestand ("vak_mg.html", header);
    synchroniseerNaarBestand ("vak_pm.html", header);
    synchroniseerNaarBestand ("vak_stpr.html", header);

    synchroniseerNaarBestand ("tentamens.html", header);
    synchroniseerNaarBestand ("deadlines.html", header);
    synchroniseerNaarBestand ("links.html", header);
    synchroniseerNaarBestand ("contact.html", header);
    synchroniseerNaarBestand ("rooster.html", header);
    synchroniseerNaarBestand ("login.html", header);

    return 0;
}
