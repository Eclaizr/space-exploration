use Yajra\DataTables\Facades\DataTables;

public function getMissions(Request $request)
{
    if ($request->ajax()) {
        $query = Missionspatiale::select([
            'idMission',
            'nomMission',
            'dateDepart',
            'dateRetour',
            'objectif',
            'estHabitee',
            'statut',
            'idVaisseau'
        ]);

        // Apply the filter if selected
        if ($request->filter == 'past') {
            $query->where('dateRetour', '<', now()); // Past missions
        } elseif ($request->filter == 'future') {
            $query->where('dateDepart', '>', now()); // Future missions
        }

        return DataTables::of($query)->make(true);
    }
}# Space exploration 🚀

/!\ NOT FINISHED /!\

Welcome to our web application developed with Laravel to manage space agencies, missions, astronauts, and celestial objects. This application provides an intuitive interface to explore data related to space expeditions, track astronaut history, and monitor space missions! (A mix of reality and fiction)

## **Features**

- **Astronaut management** (add, edit, delete).
- **Tracking space missions** and their associated spacecraft.
- **Consulting space agencies and their budgets**.
- **Exploring various celestial objects**: planets, asteroids, and satellites.

## 🛠 **Installation & Setup**
### **Prerequisites**
Make sure you have the following installed:
- PHP 8.2+
- Composer
- Laravel
- MySQL / MariaDB

### **Clone the project**
```bash
git clone https://github.com/RubenPL0/Project--PHP.git
cd exploration-space
```
## **start the server**
```bash
php artisan serve
```
Then connect to it: http://localhost:8000 !

Developed as part of our first-year engineering school project in Computer Science and Networks.

By Ruben P. and Claire M.
