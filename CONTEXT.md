# Sprint Decision

## Stack
- Laravel 11, Livewire 3, Tailwind CSS, MySQL
- Heroicons via x-heroicon-* blade components
- No controllers — all logic in Livewire components

## Routes
- / → home (SprintDecision livewire)
- /admin/sprint → Sprint listing page (admin only)
- /admin/sprint/{room} → Sprint room detail page
- /logout → POST logout

## Models
- Room: id, user_id, name, code, status (open/closed), timestamps
- Task: id, room_id, user_id, title, selected (boolean), timestamps
- Participant: id, room_id, user_id, timestamps

## Relationships
- Room belongsTo User
- Room hasMany Task
- Room hasMany Participant
- Task belongsTo Room, belongsTo User
- Participant belongsTo Room, belongsTo User

## Livewire structure
- app/Livewire/Sprint/Table.php → list all rooms
- app/Livewire/Sprint/Create.php → modal to create room
- app/Livewire/Sprint/Show.php → room detail (tasks, participants, pick decision)
- Views mirror the same path under resources/views/livewire/sprint/

## Conventions
- Computed properties use #[Computed] attribute
- Events: 'room-created' dispatched by Create, listened by Table with #[On]
- Always use $this->records in views (not $records)
- Status values: 'open' | 'closed' only

## Design System
Philosophy: clean, minimal, Linear/Vercel/Notion inspired.
No gradients, no heavy shadows, flat surfaces, subtle borders.

### Layout
- Page wrapper: max-w-3xl mx-auto px-4
- Page header: flex justify-between items-center mt-6
- Page title: font-bold text-2xl text-slate-900 dark:text-slate-100
- Section spacing: mt-6 between sections

### Table
- Wrapper: mt-6 border border-slate-200 rounded-xl overflow-hidden shadow-sm dark:border-slate-700
- Thead: bg-slate-50 border-b border-slate-200 dark:bg-slate-800 dark:border-slate-700
- Th: text-left px-4 py-3 text-slate-500 font-medium dark:text-slate-400
- Tbody: divide-y divide-slate-100 bg-white dark:divide-slate-700 dark:bg-slate-900
- Tr: hover:bg-slate-50 transition-colors dark:hover:bg-slate-800
- Td primary: px-4 py-3 font-medium text-slate-800 dark:text-slate-200
- Td secondary: px-4 py-3 text-slate-400 font-mono text-xs
- Td muted: px-4 py-3 text-slate-500 dark:text-slate-400
- Empty state: px-4 py-8 text-center text-slate-400 text-sm (use @forelse/@empty)

### Badge / Status pill
- Base: inline-flex items-center gap-1.5 text-xs font-medium px-2.5 py-1 rounded-full
- Open: bg-green-50 text-green-700 + dot bg-green-500
- Closed: bg-slate-100 text-slate-500 + dot bg-slate-400
- Dot: w-1.5 h-1.5 rounded-full

### Modal
- Overlay: fixed inset-0 z-50 flex items-center justify-center bg-black/40
- Box: bg-white dark:bg-slate-800 rounded-xl shadow-lg w-full max-w-md p-6
- Title: text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4
- Label: block text-sm text-slate-500 mb-1
- Input: w-full border border-slate-200 dark:border-slate-600 rounded-lg px-3 py-2 text-sm bg-white dark:bg-slate-900 text-slate-800 dark:text-slate-200 focus:outline-none focus:ring-2 focus:ring-sky-500
- Error: text-red-500 text-xs mt-1
- Footer: flex justify-end gap-2 mt-6
- Button cancel: text-sm px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-600 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300
- Button confirm: text-sm px-4 py-2 rounded-lg bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:opacity-90

### Action buttons (table rows)
- Navigate: x-heroicon-o-arrow-small-right w-5 h-5 text-sky-600 hover:text-sky-800
- Close: text-xs text-slate-400 hover:text-slate-600 dark:hover:text-slate-200 transition-colors
- Reopen: text-xs text-green-600 hover:text-green-800 transition-colors
- Delete: text-xs text-red-400 hover:text-red-600 transition-colors (always with wire:confirm)

### Nav
- Wrapper: bg-white fixed w-full z-20 top-0 border-b border-gray-200 shadow-sm
- Inner: max-w-7xl mx-auto px-6 flex items-center justify-between h-16
- Link inactive: text-sky-700 hover:text-sky-900 px-4 py-2 text-sm font-medium rounded-md transition-all duration-200
- Link active: text-sky-700 bg-sky-400/10 px-4 py-2 text-sm font-medium rounded-md
- Active indicator: absolute bottom-0.5 left-1/2 -translate-x-1/2 w-1 h-1 rounded-full bg-sky-400

### Room detail page (Show)
- Layout: grid grid-cols-[210px_1fr] gap-5 items-start
- Left card (participants): border border-slate-200 rounded-xl p-4 dark:border-slate-700
- Participant row: flex items-center gap-3 py-2 border-b border-slate-100 last:border-0
- Avatar: w-8 h-8 rounded-full flex items-center justify-center text-xs font-medium
- Online dot: w-2 h-2 rounded-full bg-green-500
- Right column: tasks card + decision card stacked with gap-5
- Task card: border border-slate-200 rounded-md px-4 py-3 hover:border-slate-300 hover:bg-slate-50 transition-colors cursor-pointer
- Task card selected: border-2 border-sky-400 bg-sky-50
- Section label: text-xs font-medium text-slate-400 uppercase tracking-widest mb-3
- Decision result card: border-2 border-sky-400 bg-sky-50 rounded-xl p-5
- Decision result label: text-xs font-medium text-sky-600 uppercase tracking-widest mb-2
- Room header: flex justify-between items-start mb-6
- Room code chip: inline-flex items-center gap-2 text-xs font-mono bg-slate-100 dark:bg-slate-800 px-3 py-1 rounded-md text-slate-500

## Current status
### Done
- Room model, Task model, Participant model
- Sprint\Table — lists rooms, needs publish/unpublish/destroy actions wired
- Sprint\Create — logic done, view needs modal UI
- sprint.blade.php — main listing page

### Pending
- Create modal UI (create.blade.php)
- Table actions: publish, unpublish, destroy
- Navigate to room on row click (arrow button → /admin/sprint/{room})
- Sprint\Show — room detail with tasks, participants, pick decision
- Routes for show page


The room detail page (show.blade.php) must look exactly like this:

## Page structure

### Breadcrumb (top)
- Back button (with left arrow icon) + "My sprints" text + "/" separator + room name
- Style: flex items-center gap-2 mb-6
- Back button: small bordered button with x-heroicon-o-chevron-left w-4 h-4
- Breadcrumb text: text-sm text-slate-400, room name: text-sm text-slate-200 font-medium

### Room header (below breadcrumb)
- Left side: room name as h1 (text-2xl font-bold) + status badge inline (same line)
- Status badge Open: bg-green-500 text-white text-xs font-medium px-3 py-1 rounded-full
  with a white dot before the text
- Below h1: room code as a small chip (bg-slate-700 text-slate-300 text-xs font-mono px-3 py-1 rounded-md mt-2)
- Right side: "Close room" button with x-heroicon-o-x-circle w-4 h-4 icon
  Style: border border-slate-600 text-slate-200 px-4 py-2 rounded-lg text-sm flex items-center gap-2 hover:bg-slate-700

### Two column layout
- grid grid-cols-[200px_1fr] gap-5 mt-6 items-start

### LEFT COLUMN — Participants card
- bg-slate-800 border border-slate-700 rounded-xl p-4
- Section label: text-xs font-semibold text-slate-400 uppercase tracking-widest mb-4 (e.g. "PARTICIPANTS")
- Each participant row: flex items-center gap-3 py-2
    - Avatar circle: w-9 h-9 rounded-full flex items-center justify-center text-xs font-bold text-white
      Each participant has a unique bg color (AL=blue, BR=purple, CM=teal, DS=amber)
    - Name: text-sm text-slate-200 flex-1
    - Online dot: w-2 h-2 rounded-full bg-green-400 ml-auto
- Footer: text-xs text-slate-500 mt-3 ("4 online")

### RIGHT COLUMN — two stacked cards

#### Tasks card (top)
- bg-slate-800 border border-slate-700 rounded-xl p-4
- Section label: same style as participants ("TASKS")
- Task list: flex flex-col gap-2
- Each task card:
    - bg-slate-700 border border-slate-600 rounded-lg px-4 py-3 cursor-pointer
    - hover: border-slate-500 bg-slate-600 transition-colors
    - Selected state: border-sky-500 bg-sky-900/30
    - Task title: text-sm font-semibold text-slate-100
    - Creator: text-xs text-slate-400 mt-0.5 ("by Alice Lima")

#### Decision card (bottom)
- bg-slate-800 border border-slate-700 rounded-xl p-4 mt-0
- Section label: "DECISION"
- Buttons row: flex gap-2 mb-4
    - "Pick random task" button: border border-slate-600 text-slate-200 px-4 py-2 rounded-lg text-sm flex items-center gap-2
      icon: x-heroicon-o-squares-2x2 w-4 h-4
    - "Choose manually" button: same style
      icon: x-heroicon-o-plus w-4 h-4
- Empty state: border border-dashed border-slate-600 rounded-lg py-6 text-center text-slate-500 text-sm ("No task selected yet")
- Selected result card: border border-sky-500 bg-sky-900/20 rounded-lg p-4
    - Label: text-xs text-sky-400 uppercase tracking-widest mb-1 ("SELECTED TASK")
    - Task title: text-sm font-semibold text-slate-100
    - Creator: text-xs text-slate-400 mt-0.5

## Overall page background
- Dark theme: bg-slate-900 text-slate-100
- All cards use bg-slate-800 with border-slate-700
- Accent color: sky-500 for selected states and highlights
- No white backgrounds anywhere on this page
