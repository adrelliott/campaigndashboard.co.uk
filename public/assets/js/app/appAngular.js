var app = angular.module('dashboard', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

app.controller('ContactsCtrl', function($scope, $http) {
  
    $scope.init = function(id)
    {
        $scope.id = id;
    };

    $scope.tasks = [
        { action_name: 'action 1', action_status: true },
        { action_name: 'action 2', action_status: false },
        { action_name: 'action 3', action_status: false }
    ];

    // $http.get('/api/actions?cols=action_name&where=contact_id,1').success(function(tasks) {
    //     $scope.tasks = tasks;
    // });
    
  
  
});


// function TasksController($scope, $http) {

//     $http.get('/api/actions?cols=action_name').success(function(tasks) {
//         $scope.tasks = tasks;
//     });

//     $scope.remaining = function() {
//         var count = 0;

//         angular.forEach($scope.todos, function(todo) {
//             count += todo.completed ? 0 : 1;
//         });

//         return count;
//     }

//     $scope.addTodo = function() {
//         var todo = {
//             body: $scope.newTodoText,
//             completed: false
//         };

//         $scope.todos.push(todo);

//         $http.post('todos', todo);
//     };

// }