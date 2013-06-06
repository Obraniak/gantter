<header>
	<div id="headerbg">
		<div id="topbar">
			<ul>
				<li>
					<a href="#" onclick="window.location.href='../index.html';">Plugin HomePage</a>
				</li>
				<li>
					<a href="#"  onclick="window.close();">Gantter HomePage</a>
				</li>
			</ul>
		</div>
		<div id="banner" >
			<div id="menubar1">
				<form action="https://app.gantter.com/UpdateXML.aspx" method="post">
					<input name="projectXML" id="projectXML" type="hidden">
					<input type="submit" value="Zatwierd¼">
				</form>
				<button  id="btnSave" >
					Aktualizuj
				</button>
			</div>
		</div>

	</div>

	<div id="menubar2">
		<ul>
			<li>
				<a href="#" id="btnUnjoin" class="aTooltip">Usun zaleznosc<span class="tsmall">Usuwa relacje zaleznosci pomiedzy wybranymi zadaniami</span></a>
			</li>
			<li>
				<a href="#" id="btnJoinBeginEnd" class="aTooltip">Rozpoczecie-Zakonczenie <span><strong>Relacja Rozpoczecie-Zakonczenie (RZ)</strong> <br />Zaleznosc ta oznacza, ze w chwili rozpoczecia zadania poprzednika, powinno nastapic zakonczenie prac w nastepniku.<br /> <img src="http://obraniak.eu/gantter/dev/plugin/img/rz.png"/></span></a>
			</li>
			<li>
				<a href="#" id="btnJoinBeginBegin" class="aTooltip">Rozpoczecie-Rozpoczecie<span><strong>Relacja Rozpoczecie-Rozpoczecie (RR)</strong> <br />Zaleznosc ta oznacza, ze zadanie nastepnika moze sie rozpoczac w momencie rozpoczecia zadania poprzednika.<br /> <img src="http://obraniak.eu/gantter/dev/plugin/img/rr.png"/></span></a>
			</li>
			<li>
				<a href="#" id="btnJoinEndBegin" class="aTooltip">Zakonczenie-Rozpoczecie<span><strong>Relacja Zakonczenie-Rozpoczecie (ZR)</strong> <br />Zaleznosc ta oznacza, ze zadanie nastepnika moze rozpoczac sie gdy zakonczy sie zadanie poprzednika.<br /> <img src="http://obraniak.eu/gantter/dev/plugin/img/zr.png"/></span></a>
			</li>
			<li>
				<a href="#" id="btnJoinEndEnd" class="aTooltip">Zakonczenie-Zakonczenie<span><strong>Relacja Zakonczenie-Zakonczenie (ZZ)</strong> <br />Zaleznosc ta oznacza, ze w chwili zakonczenia zadania poprzednika, nastepuje zakonczenie prac w nastepniku.<br /> <img src="http://obraniak.eu/gantter/dev/plugin/img/zz.png"/></span></a>
			</li>
			<li>
				<a href="#" id="btnClean" class="aTooltip">Wyczysc wszystkie zaleznosci<span class="tsmall">Usuwa wszystkie zaleznosci w projekcie.</span></a>
			</li>
		</ul>

	</div>
</header>
