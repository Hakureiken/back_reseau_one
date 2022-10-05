<x-app-layout>

    <form action="{{route('organization.store')}}" method="post">
        @csrf

        <input type="hidden" name="createdBy" value="{{Auth::user() -> name}}">

        <label for="name">Nom de l'entreprise : </label>
        <input type="text" id="name" name="name">

        <label for="city">Ville de l'entreprise : </label>
        <input type="text" id="city" name="adressCity">

        <label for="country">Pays de l'entreprise : </label>
        <input type="text" id="country" name="adressCountry">

        <label for="code_postal">Code Postal de l'entreprise : </label>
        <input type="text" id="code_postal" name="postal_code">

        <label for="adress">Rue de l'entreprise : </label>
        <input type="text" id="adress" name="adressStreet">

        <select name="industry">
            <option selected disabled>Veuillez selectionner une option</option>
            <option value="advertising">Publicité</option>
            <option value="aerospace">Aerospace</option>
            <option value="agriculture">Agriculture</option>
            <option value="apparelAccessories">Mode et accessoires</option>
            <option value="architecture">Architecture</option>
            <option value="automotive">Auto</option>
            <option value="banking">Banque</option>
            <option value="biotechnology">Biotechnologie</option>
            <option value="materialsEquipment">matériaux de construction & équipements</option>
            <option value="chemical">Chimie</option>
            <option value="construction">Construction</option>
            <option value="consulting">Consulting</option>
            <option value="computer">Informatique</option>
            <option value="creative">Creative</option>
            <option value="defense">Défense</option>
            <option value="education">Éducation</option>
            <option value="electronics">Électronique</option>
            <option value="electricPower">Électric power</option>
            <option value="energy">Énergie</option>
            <option value="entertainementLeisure">Divertissement et loisirs</option>
            <option value="finance">Finance</option>
            <option value="foodBeverage">Alimentation</option>
            <option value="grocery">Épicerie</option>
            <option value="healthcare">Santé</option>
            <option value="hispotality">Hospitality</option>
            <option value="insurance">Assurance</option>
            <option value="legal">Droit</option>
            <option value="manufacturing">Industrie</option>
            <option value="massMedia">Mass Media</option>
            <option value="marketing">Marketing</option>
            <option value="mining">Mining</option>
            <option value="music">Musique</option>
            <option value="publishing">Publication</option>
            <option value="petroleum">Petroleum</option>
            <option value="realEstate">Immobilier</option>
            <option value="retail">Retail</option>
            <option value="service">Service</option>
            <option value="sports">Sports</option>
            <option value="software">Logiciel</option>
            <option value="support">Support</option>
            <option value="shipping">Shipping</option>
            <option value="travel">Voyage</option>
            <option value="technology">Technologie</option>
            <option value="telecommunications">Télécommunications</option>
            <option value="television">Télévision</option>
            <option value="transportation">Transport</option>
            <option value="testingInspecCertif">Testing, Insepection & Certitication</option>
            <option value="ventureCapital">investissement</option>
            <option value="wholesale">Wholesale</option>
            <option value="water">Water</option>
        </select>

        <button>Créer</button>
    </form>
</x-app-layout>