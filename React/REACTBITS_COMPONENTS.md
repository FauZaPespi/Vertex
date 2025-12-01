# React Bits Components

This project includes several animated React Bits components installed in `src/components/ui/`.

## Installed Components

### Text Animations

#### 1. BlurText
Text starts blurred then crisply resolves for a soft-focus reveal effect.
```jsx
import BlurText from '@/components/ui/BlurText';

<BlurText
  text="Hello World"
  delay={200}
  animateBy="words"
  direction="top"
/>
```

#### 2. CircularText
Text arranged in a circular pattern with customizable radius and animation.
```jsx
import CircularText from '@/components/ui/CircularText';

<CircularText
  text="Circular Text Animation"
  radius={100}
/>
```

#### 3. RotatingText
Cycles through multiple phrases with 3D rotate/flip transitions.
```jsx
import RotatingText from '@/components/ui/RotatingText';

<RotatingText
  texts={['First Text', 'Second Text', 'Third Text']}
  rotationInterval={2000}
  splitBy="characters"
/>
```

### Backgrounds

#### 4. Aurora
Beautiful aurora background effect with animated gradients.
```jsx
import Aurora from '@/components/ui/Aurora';

<Aurora />
```

#### 5. Beams
Animated beam effects background (requires three.js).
```jsx
import Beams from '@/components/ui/Beams';

<Beams />
```

## Import All Components

You can import all components at once from the central index:

```jsx
import { BlurText, CircularText, RotatingText, Aurora, Beams, Button } from '@/components/ui';
```

## Adding More Components

To add more React Bits components, use the provided installer script:

```bash
python install-components.py
```

Or manually add components using shadcn:

```bash
npx shadcn@latest add @react-bits/ComponentName
```

## Available React Bits Components

Visit [reactbits.dev](https://reactbits.dev) to browse 135+ animated components including:

- **Text Animations**: BlurText, CountUp, TypewriterText, WavyText, etc.
- **Animations**: BlobCursor, SplashCursor, Magnet, etc.
- **Backgrounds**: Aurora, Particles, Beams, Gradient, etc.
- **Components**: Buttons, Forms, Loaders, Cards, etc.

## Dependencies

The following dependencies are installed for React Bits components:

- `motion` (Framer Motion v12) - For text animation components
- `ogl` - For Aurora background
- `clsx` & `tailwind-merge` - For className utilities

## Notes

- All components support dark mode via Tailwind CSS variables
- Components are fully customizable with props
- Most components have TypeScript support when using `.tsx` files
- All components are accessible and follow WCAG guidelines
