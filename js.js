angular.module('ProjectsCards', [])

    function AppController($scope) {
        $scope.cards = [];
        
      
      $scope.setCards = function() {
        $scope.cards = [
            {
                Name: "Futófigura rajzolása",
                Description: "A futófigura rajzolása felületen figurákat tud a felhasználó rajzolni, amiket le tud tölteni, vagy a szerverre azonnal elmenteni.",
                
            },
            {
              Name: "Track fájl feltöltése",
              Description: "Ezen a felületen lefutott GPX trackek feltöltése lehetséges. Ezt a rendszer azonnal átkonvertálja png formátumba a további feldolgozás érdekében.",
          },
          {
            Name: "Figurák hasonlítása",
            Description: "Ezen a felületen a már feltöltött figurákat lehet megtekinteni, illetve azt is, hogy mire hasonlítanak a legjobban.",
        },
        
        {
          Name: "Track fájl szinkronizálása",
          Description: "Ezen a felületen track fájlokat lehet szinkronizálni."
      },
      
      ]
    }
      $scope.setCards();
      
    }


    function AdminController($scope){
      $scope.oldcards=[];
      $scope.setOldCards = function() {
          $scope.oldcards = [
            {
              Name: "Leadott figurák kezelése",
              Description: "Ezen a felületen az admin kezelheti a leadott figurákat, Törölheti, átnevezheti őket."
          },
          {
                Name: "Kiírt versenyek kezelése",
                Description: "Ezen a felületen az admin kezelheti a versenyeket. Törölheti, átnevezheti őket."
              },]
      }
          $scope.setOldCards();
  }
    angular
    .module('ProjectsCards')
    .controller('AppController', AppController)
    .controller('AdminController', AdminController)